<?php

namespace App\Models;

use App\Models\DoctorProfile;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['file', 'doctor_profile_id'];

    public function doctor()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}
