<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['admins'] = User::whereType('admin')->get();
        return view('admin.admin.index', $data);
    }

    public function create()
    {
        $data['roles'] = Role::get();
        return view('admin.admin.create', $data);
    }

    public function edit(User $admin)
    {
        $data['roles'] = Role::get();
        return view('admin.admin.edit', $data, compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role_id' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->role_id = $request->role_id;
        $model->password = bcrypt($request->password);
        $model->type = 'admin';
        $model->save();

        return redirect()->route('admins.index')->with('success', 'Action successfully completed.');
    }

    public function update(User $admin, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required|unique:users,email',
        ]);

        $admin->name = $request->name;
        $admin->role_id = $request->role_id;

        if($request->password != null) {
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $admin->password = bcrypt($request->password);
        }

        $admin->save();
        return redirect()->route('admins.index')->with('success', 'Action successfully completed.');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return back()->with('success', 'Action successfully completed.');
    }
}
