<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\DataTables\RolesDataTable;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read roles', ['only' => ['index','show']]);
        $this->middleware('permission:create roles', ['only' => ['create','store']]);
        $this->middleware('permission:update roles', ['only' => ['edit','update']]);
        $this->middleware('permission:delete roles', ['only' => ['destroy']]);
    }

    public function index(RolesDataTable $dataTable)
    {
        $add_route = 'roles.create';
        return $dataTable->render('layouts.setting',compact('add_route'));
    }

    public function create()
    {
        return view('setting.role-form',['role'=>new Role()]);
    }

    public function store(Request $request)
    {
        $name = strtoupper($request->name);
        Role::create($request->all());
        return to_route('roles.index')->with('success','role '.$name.' telah ditambahkan');
    }

    public function edit(Role $role)
    {
        return view('setting.role-form', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $name = strtoupper($role->name);
        $data = $request->all();
        $role->fill($data)->save();

        return to_route('roles.index')->with('success','role '.$name.' telah diperbarui');
    }

    public function destroy(Role $role)
    {
        $name = strtoupper($role->name);
        $role->delete();
        return to_route('roles.index')->with('warning','role '.$name.' telah dihapus');
    }
}
