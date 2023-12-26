<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions= Permission::latest()->paginate(10);
        return view('admin.pages.permission.list',['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permission.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$request->name.',name',
        ]);
        $data = $request->except('_token');
        $permission = new Permission();
        $permission->create($data);
        return redirect()->route('permissions.index')->with(['success'=>'Permission Has been successfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.pages.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$request->name.',name',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        if($permission){
            return redirect()->route('permissions.index')->with(['success'=>'Permission Has been successfully updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        if($permission){
            $permission->delete();
            return ok($permission,'Permission Deleted successfully');
        }
    }
}
