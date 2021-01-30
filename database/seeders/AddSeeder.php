<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Adds;
class AddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = Adds::create([
            'title' => 'Admin',
            'contentType' => 'image',
            'adType' => 'bannerAdd',
            'status'=>TRUE,
            'user_id'=>1
        ]);
    }
}
