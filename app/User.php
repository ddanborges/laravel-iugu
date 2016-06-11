<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Potelo\GuPayment\GuPaymentTrait;

class User extends Authenticatable
{
    /**
     * Adiciona o tratamento de assinaturas do iugu
     */
    use GuPaymentTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
