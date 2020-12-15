<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\VerifyResetPassword;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthUserController extends Controller
{
    // Register
    public function register(Request $request)
    {
        // Validtion
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|string|email|max:100|unique:users',
            'password' => 'nullable|string|confirmed|min:6',
            'phone' => 'required|unique:users|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Craete User
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'verification_code' => rand(1111, 9999),
        ]);


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);
    }


    public function checkVerificationCode(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user)
            return response()->json([
                'message' => 'The User Is Not Exist'
            ], 404);

        if ($request->has('verification_code')) {
            if ($user->verification_code === $request->verification_code) {
                $user->update([
                    'is_active' => "active",
                    'phone_verified_at'  => Carbon::now(),
                ]);
                Auth::login($user);
                return response()->json([
                    'message' => 'You Are logged in Succussefuly'
                ], 201);
            } else {
                return response()->json([
                    "msg" => "This Verification Is Invalid"
                ], 404);
            }
        }
    }


    public function resendVcode(Request $request)
    {
        $phone = $request->phone;
        $v_code = rand(1111, 9999);
        $user = User::where('phone', $phone)->first();
        $user->update([
            'verification_code' => $v_code,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json([
            'user' => $user
        ]);
    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = [
            'phone' => request('phone'),
            'password' => request('password'),
            'is_active' => 'active'
        ];

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function user_profile()
    {
        return response()->json(auth()->user());
    }


    public function sendResetPasswordVCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // find User
        $user = User::where('phone', $request->phone)->first();
        if (!$user)
            return response()->json([
                'message' => 'The User Is Not Exist'
            ], 404);


        // Create Verification Code
        $v_code = rand(1111, 9999);
        VerifyResetPassword::create([
            'phone' => $request->phone,
            'verification_code' => $v_code,
            'created_at' => Carbon::now()
        ]);

        if ($user && $v_code)
            return response()->json([
                'message' => 'We have Sent A SMS To Your Phone Number',
                'user' => $user,
            ]);
    }



    public function resendPasswordVCode(Request $request)
    {
        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        $v_code = rand(1111, 9999);
        $VRP = VerifyResetPassword::where('phone', $phone)->update([
            'verification_code' => $v_code,
            'created_at' => Carbon::now(),
        ]);
        return response()->json([
            'user' => $user,
        ]);
    }


    public function create_token(Request $request)
    {
        $phone = $request->phone;
        $VerifyResetPW = VerifyResetPassword::where('phone', $phone)->first();
        $user = User::where('phone', $phone)->first();

        if ($request->has('v_code')) {
            if ($VerifyResetPW->verification_code == $request->v_code) {
                $passwordReset = PasswordReset::create([
                    'phone' => $request->phone,
                    'token' => Str::random(60),
                    'created_at' => Carbon::now()
                ]);
                return($passwordReset);

                VerifyResetPassword::where('phone', $phone)->delete();
            }
        }

        return response()->json([
            'token' => $passwordReset->token,
            'user' => $user
        ]);
    }


    public function resetPassword(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'  // hidden input
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['phone', $request->phone]
        ])->first();

        // return $passwordReset;

        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);


        $user = User::where('phone', $passwordReset->phone)->first();
        if (!$user)
            return response()->json([
                'message' => 'The User Does Not Exist'
            ], 404);

        $user->password = bcrypt($request->password);
        $user->save();
        // $passwordReset->delete();
        PasswordReset::where([
            ['token', $request->token],
            ['phone', $request->phone]
        ])->delete();
        return response()->json($user);
    }
}
