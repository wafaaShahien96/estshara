<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('country')->latest()->paginate(5);

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.users.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|string|email|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'required|unique:users,phone',
            'image' => 'nullable|image',
            'gender' => 'nullable|in:male,female',
            'country_id' => 'nullable|integer',
            'is_active' => 'required|in:active,inactive',
            'age' => 'nullable|integer'

        ]);


        $data = request()->all();

        if(request()->has('password')){
            $data['password'] = Hash::make($data['password']);
        }

        // dd(storage_path('public/dashboard/users/'));

        if (request()->hasFile('image')) {

            $poster = Image::make($request->image)->encode('jpg');
            Storage::disk('local')->put('public/images/users/' . $request->image->hashName(), (string)$poster, 'public');

            $data['image'] = request()->image->hashName();
        } //end of if


        User::create($data);

        return redirect()->route('admin.users.index')->with(["success" => 'User Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $countries = Country::select('id')->get();
        return view('dashboard.users.show', compact('user', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $countries = Country::all();
        return view('dashboard.users.edit', compact('user', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'nullable', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => ['required',  Rule::unique('users')->ignore($user->id),],
            'image' => 'sometimes|image',
            'gender' => 'nullable|in:male,female',
            'country_id' => 'nullable|integer',
            'is_active' => 'required|in:active,inactive',
            'age' => 'nullable|integer'

        ]);

        $data = request()->all();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }

        if (request()->hasFile('image')) {

            Storage::disk('local')->delete('public/images/users/' . $user->image);
            $poster = Image::make($request->image)->encode('jpg');
            Storage::disk('local')->put('public/images/users/' . $request->image->hashName(), (string)$poster, 'public');

            $data['image'] = request()->image->hashName();
        } //end of if


        $user->update($data);

        return redirect()->route('admin.users.index')->with(["success" => 'User Updated Successfully']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('local')->delete('public/images/users/' . $user->image);
        $user->delete();

        return redirect()->route('admin.users.index')->with(["success" => 'User Deleted Successfully']);;
    }
}
