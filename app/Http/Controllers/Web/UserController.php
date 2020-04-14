<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 22.03.2020
 * Time: 00:53
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebBaseController;
use App\Http\Requests\UserControllerRequests\StoreOrUpdateUserRequest;
use App\Models\System\Role;
use App\Models\System\User;

class UserController extends WebBaseController
{

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.main.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $user = new User();
        return view('admin.main.users.create', compact('roles', 'user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.main.users.edit', compact('user', 'roles'));

    }

    public function store(StoreOrUpdateUserRequest $request)
    {
        $user = User::create($request->all());
        $user->password = bcrypt($user->password);
        $user->save();
        $this->added();
        return redirect()->back();
    }

    public function update($id, StoreOrUpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->fill($request->except('password'));
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $this->edited();
        return redirect()->back();
    }
}