<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use Sentinel;

class ManagementController extends Controller
{
    //
    public function index()
    {
        $role = Sentinel::findRoleById(6);
        $managements = $role->users()->with('roles')->get();
        return view('pages.superAdmin.management.list', compact('managements'));
    }

    public function create()
    {
        return view('pages.superAdmin.management.form');
    }

    public function store(Request $request)
    {
        //
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $user = Sentinel::registerAndActivate($data);
        $role = Sentinel::findRoleBySlug('management');
        $user->roles()->attach($role);
        return redirect()->route('superAdmin.management.list');
    }

    public function edit($id)
    {
        $management =  User::find($id);
        return view('pages.superAdmin.management.form', compact('management'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        $user = Sentinel::findById($id);
        $user->update($user, $data);

        return redirect()->route('superAdmin.admin.list');
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('superAdmin.admin.list');
    }
}
