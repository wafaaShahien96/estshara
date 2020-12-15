<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Specialty extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = "specialties";

    protected $fillable = ['id'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    public function doctorProfiles()
    {
        return $this->hasMany(DoctorProfile::class);
    }
}
