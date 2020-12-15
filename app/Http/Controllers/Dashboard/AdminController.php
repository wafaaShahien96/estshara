<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:admin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(5);

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required']
        ]);


        if (request()->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        if (request()->has('active')) {
            $data['active'] = $request->input('active') ? true : false;
        }

        $admin = Admin::create($data);
        $admin->assignRole(request()->input('roles'));

        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::all();

        // Role::pluck('name', 'id')->toArray();

        // in this case i can write index in blade template as value in select area

        // Role::all(); in this case i can write $role->id as value in select area

        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        // dd($request->all());
        request()->validate([

            'name' => 'required',
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('admins')->ignore($admin->id),
            ],
            'password' => 'sometimes|confirmed',
            'roles' => 'required'
        ]);

        $data = request()->all();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }

        $admin->update($data);
        // dd($admin->roles);
        DB::table('model_has_roles')->where('model_id', $admin->id)->delete();
        $admin->assignRole(request()->input('roles'));

        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Deleted successfully']);
    }

    // public function updateStatus(Request $request)
    // {

    //     $admin = Admin::findOrFail($request->user_id);
    //     $admin->active = $request->active;
    //     $admin->save();

    //     return response()->json(['message' => 'Admin status updated successfully.']);
    // }
}
