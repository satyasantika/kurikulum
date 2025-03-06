<?php

namespace App\Http\Controllers\Setting;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read users', ['only' => ['index','show']]);
        $this->middleware('permission:create users', ['only' => ['create','store']]);
        $this->middleware('permission:update users', ['only' => ['edit','update']]);
        $this->middleware('permission:delete users', ['only' => ['destroy']]);
    }

    public function index(UsersDataTable $dataTable)
    {
        $add_route = 'users.create';
        return $dataTable->render('layouts.setting',compact('add_route'));
    }

    public function create()
    {
        $user = new User();
        return view('setting.user-form',array_merge(
            [ 'user' => $user ],
            $this->_dataSelection(),
        ));
    }

    public function store(UserRequest $request)
    {
        $name = strtoupper($request->name);
        $data = $request->safe()->merge([
            'password'=> bcrypt($request->password),
        ]);
        User::create($data->all())->assignRole($request->role);
        return to_route('users.index')->with('success','user '.$name.' telah ditambahkan');
    }

    public function edit(User $user)
    {
        return view('setting.user-form',array_merge(
            [ 'user' => $user ],
            $this->_dataSelection(),
        ));
    }

    public function update(UserRequest $request, User $user)
    {
        $name = strtoupper($user->name);
        $data = $request->all();
        $user->fill($data)->save();

        return to_route('users.index')->with('success','user '.$name.' telah diperbarui');
    }

    public function destroy(User $user)
    {
        $name = strtoupper($user->name);
        $user->delete();
        return to_route('users.index')->with('success','user '.$name.' telah dihapus');
    }

    public function activation(User $user)
    {
        $name = strtoupper($user->name);
        $user->hasPermissionTo('active') ? $user->revokePermissionTo('active') : $user->givePermissionTo('active');
        // $user->is_active = $user->is_active ? 0 : 1;
        // $user->save();
        $status = $user->hasPermissionTo('active') ? 'aktiv':'non-aktiv';
        return redirect()->back();
        // return to_route('users.index')->with('success','user '.$name.' telah di'.$status.'kan');
    }

    private function _dataSelection()
    {
        return [
            'roles' =>  Role::all()->pluck('name')->sort(),
        ];
    }
}
