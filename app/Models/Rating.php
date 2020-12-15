<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    protected $filable = ['rating', 'user_id', 'doctor_id'];

    public function doctor()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}