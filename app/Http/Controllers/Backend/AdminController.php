<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct() {
        $this->data['admin_active'] = 'menu-open';
    }
    public function index() {
        $this->data['admins'] = User::all();
        $this->data['admin_all_active'] = 'active';
        return view('backend.admin.index', $this->data);
    }
    public function create() {
        $this->data['admin_add_active'] = 'active';
        return view('backend.admin.create', $this->data);
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required|unique:users,email',
            'phone' => 'string|min:11|required|unique:users,phone',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => ($request->is_active == 'on') ? 1 : 0,
        ]);
        return redirect()->route('admin.admin.index')->with('success', 'Admin Created Successfylly');
    }
    public function edit(User $user) {
        $this->data['user'] = $user;
        return view('backend.admin.admin_edit', $this->data);
    } 
    public function update (Request $request, User $user) {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required|unique:users,email,'.$user->id,
            'phone' => 'string|min:11|required|unique:users,phone,'.$user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => ($request->is_active == 'on') ? 1 : 0,
        ]);
        return redirect()->route('admin.admin.index')->with('success', 'Admin Update Successfylly');
    }




    public function change_password() {
        $this->data['change_password_active'] = 'active';
        return view('backend.admin.change_password', $this->data);
    }
    public function set_new_password(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            // dd($request->all());
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin.admin.index')->with('success', 'Password changed successfully');
        } else {
            return back()->withErrors('Opps password not metch');
        }
    }
}
