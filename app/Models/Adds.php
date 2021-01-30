<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adds extends Model
{
    use HasFactory;
    protected $with = ['user'];
    protected $table="adds";
    protected $fillable=['title','adType','contentType','CPA','status','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
