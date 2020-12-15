<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

class Country extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'countries';

    protected $fillable = ['currency'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    public function doctorProfiles()
    {
        return $this->hasMany(DoctorProfile::class);
    }


}
