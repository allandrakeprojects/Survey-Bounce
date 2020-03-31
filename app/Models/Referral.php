<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model{
    //
    protected $table = 'referral';





    protected $fillable = [
        'referral', 'referral_by', 'referral_amount','status',
    ];




}
