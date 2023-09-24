<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $data['permissions'] = Permission::get();
        return view('admin.permission.index', $data);
    }

    public function show(Permission $permission)
    {
        return $permission;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $model = new Permission();
        $model->name = $request->name;
        $model->save();

        return back()->with('success', 'Action successfully completed.');
    }

    public function update(Permission $permission, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $permission->name = $request->name;
        $permission->save();

        return back()->with('success', 'Action successfully completed.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Action successfully completed.');
    }
}
