<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\VerifyResetPassword;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthDoctorController extends Controller
{
    public function register(Request $request)
    {
        // Validtion
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|string|email|max:100|unique:doctors',
            'password' => 'nullable|string|confirmed|min:6',
            'phone' => 'required|unique:doctors|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Craete User
        $doctor = Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'verification_code' => rand(1111, 9999),
        ]);


        return response()->json([
            'message' => 'Doctor successfully registered',
            'doctor' => $doctor,
        ], 201);
    }

    public function checkVerificationCode(Request $request)
    {
        $doctor = Doctor::where('phone', $request->phone)->first();
        if (!$doctor)
        return response()->json([
            'message' => 'Doctor Does Not Exist'
        ], 404);

        if($request->has('verification_code'))
        {
            if($doctor->verification_code === $request->verification_code)
            {
                $doctor->update([
                    'status' => 'active',
                    'phone_verified_at'  => new Carbon(),

                ]);

                Auth::guard('doctor_api')->login($doctor);

                return response()->json([
                    'message' => 'You Are logged in Succussefuly'
                ], 201);
            }

            } else{
                return response()->json([
                    "msg" => "This Verification Is Invalid"
                ], 404) ;
            }
        }

    public function resendVcode(Request $request)
    {
        $phone = $request->phone;
        $v_code = rand(1111,9999);
        $doctor = Doctor::where('phone', $phone)->first();
        $doctor->update([
            'verification_code' => $v_code ,
            'updated_at' => new Carbon(),
        ]);
        return response()->json([
            'doctor' => $doctor,
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'phone' => 'required|exists:doctors,phone',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $credentials = [
            'phone' => request('phone'),
            'password' => request('password'),
            'status' => 'active'
        ];

        if (! $token = Auth::guard('doctor_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout() {
        Auth::guard('doctor_api')->logout();
        return response()->json(['message' => 'Doctor successfully signed out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function compeleteProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
            'phone' => 'required|numeric',
            'fees' => 'required|numeric',
            'national_id' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'country_id' => 'required',
            'specialty_id' => 'required',
            'bio:en' => 'required',
            'bio:ar' => 'required',
            // 'image' => 'required|image',
            'documents' => 'required',
            'doctor_status' => 'required|in:online,offline,busy',
            'is_active' => 'required',
            'ex_type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        DB::beginTransaction();
        $doctor = Auth::guard('doctor_api')->user();
        $doctor_data = $request->only(['first_name','last_name','email','phone']);
        // $doctor_data['password'] = bcrypt($request->password);
        $doctor->update($doctor_data);

        $profile_data = $request->except(['first_name','last_name','email','phone','image','documents']);

        // $image = $request->image;  // your base64 encoded
        // $image = str_replace('data:image/png;base64,', '', $image);
        // $image = str_replace(' ', '+', $image);
        // $imageName = str_random(10) . '.png';


        // Save Image
        if (request()->hasFile('image')) {
            $profile_img = Image::make($request->image)->encode('jpg');
            Storage::disk('local')->put('public/images/doctors/profile_images/' . $request->image->hashName(), (string)$profile_img, 'public');
            $profile_data['image'] = request()->image->hashName();
        }

        $doctor_profile = $doctor->doctorProfile()->create($profile_data);

        // Save Dcument
        if (request()->hasFile('documents')) {
            $docs = $request->documents;
            foreach ($docs as $doc) {
                $document = Image::make($doc)->encode('jpg');
                Storage::disk('local')->put('public/images/doctors/documents/' . $doc->hashName(), (string)$document, 'public');
                $doctor_profile->files()->create([
                    'file' => $doc->hashName(),
                ]);
            }
        }

        DB::commit();
        return response()->json([
            'msg' => 'The Doctor Created Successfully'
        ]);

        DB::rollBack();
        return response()->json([
            'msg' => 'ther Aer Error , Try Again'
        ]);

    }

    public function doctorprofile() {
        // $doctor = auth()->guard('doctor_api')->user();
        $doctor = auth()->guard('doctor_api')->user()->with('doctorProfile')->first();
        return response()->json([
                'doctor' => $doctor
        ]);
    }

    public function sendResetPasswordVCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'phone' => 'required|exists:doctors,phone',
          ]);

         if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $doctor = Doctor::where('phone', $request->phone)->first();
           if (!$doctor)
        return response()->json([
            'message' => 'The Doctor Is Not Exist'
        ], 404);

          $v_code = rand(1111,9999);
           VerifyResetPassword::create([
        'phone' => $request->phone,
        'verification_code' => $v_code,
        'created_at' => Carbon::now()
             ]);

          if ($doctor && $v_code)
         return response()->json([
        'message' => 'We have Sent A SMS To Your Phone Number',
        'doctor' => $doctor,
        'v_code' => $v_code
            ]);
    }


    public function resendPasswordVCode(Request $request)
    {
        $phone = $request->phone;
        $doctor = Doctor::where('phone', $phone)->first();
        $v_code = rand(1111,9999);
        $VRP = VerifyResetPassword::where('phone', $phone)->update([
            'verification_code' => $v_code ,
            'created_at' => new Carbon(),
        ]);
        return response()->json([
            'doctor' => $doctor,
        ]);
    }

    public function create_token(Request $request)
    {
        $phone = $request->phone;

        $VerifyResetPW = VerifyResetPassword::where('phone' , $phone)->first();
        $doctor = Doctor::where('phone', $phone)->first();

        $passwordReset = "";
        if($request->has('verification_code'))
        {
            if($VerifyResetPW->verification_code == $request->verification_code )
            {

                $passwordReset = PasswordReset::create([
                    'phone' => $request->phone,
                    'token' => Str::random(60),
                    'created_at' => Carbon::now()
                ]);

                VerifyResetPassword::where('phone' , $phone)->delete();
            }
        }

        return response()->json([
            'token' =>$passwordReset->token,
            'doctor' => $doctor
        ]);
    }


    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['phone', $request->phone]
        ])->first();

        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);


        $doctor = Doctor::where('phone', $passwordReset->phone)->first();
        if (!$doctor)
            return response()->json([
                'message' => 'The Doctor Does Not Exist'
            ], 404);

        $doctor->password = bcrypt($request->password);
        $doctor->save();
        PasswordReset::where([
            ['token', $request->token],
            ['phone', $request->phone]
        ])->delete();
        return response()->json($doctor);
    }
}
