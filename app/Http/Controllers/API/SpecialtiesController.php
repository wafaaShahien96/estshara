<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialtiesController extends Controller
{
    public function all()
    {
        $specialties = Specialty::latest()->paginate(5);
        return response()->json([
            'specialties' => $specialties
        ]);
    }

    public function getDoctors(Request $request)
    {
        $doctors = DB::table('doctors')
            ->join('doctor_profiles', 'doctors.id', '=', 'doctor_profiles.doctor_id')
            ->select('doctors.*', 'doctor_profiles.*')
            ->where('doctor_profiles.specialty_id', $request->specialty_id)
            ->get();
        return response()->json([
            'doctors' => $doctors
        ]);
    }
}
