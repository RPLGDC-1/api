<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::get();
        return view('admin.role.index', $data);
    }
    
    public function create()
    {
        $data['permissions'] = Permission::get();
        return view('admin.role.create', $data);
    }
    
    public function edit(Role $role)
    {
        $data['permissions'] = Permission::get();
        return view('admin.role.edit', $data, compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $model = Role::create([
            'name' => $request->name,
        ]);

        // Permission Handler
        $permissions = [];
        foreach($request->keys() as $row) {
            if($row == '_token' || $row == '_method' || $row == 'name') continue;
            array_push($permissions, $row);
        }
        
        $model->permissions()->sync($permissions);
        return redirect()->route('roles.index')->with('success', 'Action successfully completed.');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $role->name = $request->name;
        $role->save();

        // Permission Handler
        $permissions = [];
        foreach($request->keys() as $row) {
            if($row == '_token' || $row == '_method' || $row == 'name') continue;
            array_push($permissions, $row);
        }
        
        $role->permissions()->sync($permissions);
        return redirect()->route('roles.index')->with('success', 'Action successfully completed.');
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return back()->with('success', 'Action successfully completed.');
        } catch(\Exception $e) {
            return back()->with('error', "Somethin went wrong with code {$e->getCode()}");
        }
    }
}
