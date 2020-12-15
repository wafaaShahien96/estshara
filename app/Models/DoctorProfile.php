<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class DoctorProfile extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = "doctor_profiles";

    protected $fillable = [
        'phone',
        'gender',
        'image',
        'documents',
        'doctor_status',
        'is_active',
        'ex_type',
        'national_id',
        'fees',
        'doctor_id',
        'country_id',
        'specialty_id',
        'specialty_id',
        // 'examination_type_id'
    ];

    protected $with = ['translations'];

    protected $translatedAttributes = ['bio'];

    protected $casts = [
        'ex_type' => 'array'
    ];

    // public function getImageAttribute($val)
    // {
    //     return ($val != null) ? asset('storage/images/doctors/profile_images/'.$val) : "" ;
    // }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    public function specialties()
    {
        return $this->belongsTo(Specialty::class );
    }

    public function ratings()
    {
      return $this->hasMany(Rating::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function examination_types()
    {
        return $this->hasMany(ExaminationType::class);
    }

}
