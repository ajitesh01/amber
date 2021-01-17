<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
// use OptimoApps\RazorPayX\Entity\Account;
// use OptimoApps\RazorPayX\Entity\Contact;
// use OptimoApps\RazorPayX\Entity\Vpa;
// use OptimoApps\RazorPayX\Enum\AccountTypeEnum;
// use OptimoApps\RazorPayX\Enum\ContactTypeEnum;
// //use RazorPayX;

class UserService extends BaseService
{
    /**
     * Creating Instance Of Model
     *
     * @return void
     */

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function search($searchTerm = null)
    {
        return $this->model
            ->where('name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$searchTerm}%")
       //     ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
            ->orderBy('id', 'DESC')
            ->paginate($this->page_size);
    }

    public function getUsers()
    {
        return $this->model->where('type', 2)->get();
    }

    public function getUsersByIds($ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function getCredit(User $user)
    {
        return $user->getCredits();
    }

    public function random_strings($length_of_string)
    {
        return substr(str_shuffle(md5(microtime())), 0, $length_of_string);
    }

    public function check_referral($referral_code)
    {
        return $this->model->whereReferralCode($referral_code)->first() ? true : false;
    }

    public function make_referral_transaction($referral_code, User $user)
    {
        try {
            return DB::transaction(function () use ($referral_code, $user) {
                $referrer = $this->model->whereReferralCode($referral_code)->first();
                if ($referrer && $referrer->id != $user->id) {
                    $referrer->transactions()->save(new Transaction(['is_referral' => true, 'type' => 'referral', 'credit' => $this->getOnReferralPoints()]));
                    return true;
                }
                return false;
            });
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->where('provider_user_id', '!=', null)->first();
    }

    public function findByPhone($phone)
    {
        return $this->model->wherePhone($phone)->where('provider_user_id', '!=', null)->first();
    }

    public function createVpa(User $user, $vpa)
    {
        // if razorpay account not created then create account
        if ($user->razorpay_id == null) {
            $contact = new Contact();
            $contact->name = $user->name;
            $contact->email = $user->email;
            $contact->type = ContactTypeEnum::CUSTOMER;
            $response = RazorPayX::contact()->create($contact);
            $user->razorpay_id = $response->id;
            $user->save();
        }
        // Vpa object Init
        $vpaAccount = new Vpa();
        $vpaAccount->address = $vpa;
        $account = new Account();

        // Account object init
        $account->contact_id = $user->razorpay_id;
        $account->account_type = AccountTypeEnum::VPA;
        $account->vpa = $vpaAccount;

        // Creating account in razorpay x
        $response = RazorPayX::account()->create($account);

        // Inserting into my system
        return $user->paymentAddresses()->create([
            'account_id' => $response->id,
            'account_type' => $response->account_type,
            'address' => $response->vpa->address,
        ]);
    }
}
