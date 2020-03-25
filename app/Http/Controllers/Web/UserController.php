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
        $user = User::find($id);
        $this->checkExistsOrRedirectBack($user);
        $roles = Role::all();
        return view('admin.main.users.edit', compact('user', 'roles'));

    }

    public function store(StoreOrUpdateUserRequest $request)
    {
        User::create($request->all());
        $this->added();
        return redirect()->back();
    }

    public function update($id, StoreOrUpdateUserRequest $request)
    {
        $user = User::find($id);
        $this->checkExistsOrRedirectBack($user);
        $user->fill($request->all());
        $user->save();
        $this->edited();
        return redirect()->back();
    }
}