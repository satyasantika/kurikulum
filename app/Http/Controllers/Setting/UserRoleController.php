<?php

namespace App\Http\Controllers\Setting;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:update roles|update users', ['only' => ['edit','update']]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        $getUserRoles = $user->getRoleNames();
        $userRoles=[];
        foreach ($getUserRoles as $userRole) {
            array_push($userRoles,$userRole);
        }

        return view('setting.userrole-form',compact('user','roles','userRoles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $name = strtoupper($user->name);
        $user->syncRoles($request->roles);

        return to_route('users.index')->with('success','role untuk user '.$name.' telah diperbarui');
    }

}
