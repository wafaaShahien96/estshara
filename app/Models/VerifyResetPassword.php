<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyResetPassword extends Model
{
    protected $table = "verify_reset_passwords";

    protected $fillable = ['phone', 'verification_code', 'created_at'];

    public $timestamps = false;


}
