<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorProfileTranslation extends Model
{
    protected $table = "doctor_profile_translations";

    protected $fillable = ['doctor_profile_id', 'locale', 'bio'];

    public $timestamps = false;
}
