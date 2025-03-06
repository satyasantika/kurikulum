<?php

namespace App\Http\Controllers\Setting;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:update roles|update users', ['only' => ['edit','update']]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $via_roles = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        $permissions = Permission::whereNotIn('name',$via_roles)->orderBy('name')->get();
        $userPermissions = $user->getAllPermissions()->pluck('name');
        $all_permission=[];
        foreach ($userPermissions as $userPermission) {
            array_push($all_permission,$userPermission);
        }
        // $via_roles = $user->getPermissionsViaRoles()->pluck('name')->toArray();

        return view('setting.userpermission-form',compact('user','permissions','all_permission','via_roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $name = strtoupper($user->name);
        $user->syncPermissions($request->permissions);

        return to_route('users.index')->with('success','permission untuk user '.$name.' telah diperbarui');
    }
}
