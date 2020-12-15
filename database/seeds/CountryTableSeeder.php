<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Country::create([
           'en' => [
               'name' => 'Egypt'
           ],
           'ar' => [
            'name' => 'مصر'
        ],

        'currency' => 'EGP'
       ]);
    }
}