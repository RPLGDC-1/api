<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = User::whereType('user')->get();
        return view('admin.customer.index', $data);
    }

    public function create()
    {
        $data['roles'] = Role::get();
        return view('admin.customer.create', $data);
    }

    public function edit(User $customer)
    {
        $data['roles'] = Role::get();
        return view('admin.customer.edit', $data, compact('customer'));
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

    public function update(User $customer, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required|unique:users,email',
        ]);

        $customer->name = $request->name;
        $customer->role_id = $request->role_id;

        if($request->password != null) {
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $customer->password = bcrypt($request->password);
        }

        $customer->save();
        return redirect()->route('admins.index')->with('success', 'Action successfully completed.');
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return back()->with('success', 'Action successfully completed.');
    }
}
