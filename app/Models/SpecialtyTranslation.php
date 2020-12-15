<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialtyTranslation extends Model
{
    protected $table = 'specialty_translations';

    protected $fillable = ['specialty_id','locale', 'name'];

    public $timestamps = false;
}
