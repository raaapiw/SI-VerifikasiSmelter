<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use Sentinel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addClient()
    {
        $role = Sentinel::findRoleById(4);
        
        $users = $role->users()->get();
        // bentar ini jadinya si user banyak yak bukan cuman 1 ingetr, iyo ri ini tuh menu buat nambahin user ke tabel client
        // wait inet tolol ini kantor
        // $users = User::where($tempuser)->get();
        // lu mau ngambil apanya fi? wait , jadi gua mau ambil data user yg rolenya itu client gt ri
        // return dd($users);sal
        return view ('pages.superAdmin.client.addClient', compact('users'));
    }

    public function storeClient(Request $request)
    {
        $data = [
            'company_name'      => $request->company_name,
            'address'    => $request->address,
            'phone'     => $request->phone,
            'user_id'  => $request->user_id,
        ];

        $client = Client::create($data);
        
        return redirect()->route('superAdmin.client.list');
    }

    public function updateClient(Request $request, $id)
    {
        $data = [
            'company_name'      => $request->company_name,
            'address'    => $request->address,
            'phone'     => $request->phone,
            'user_id'  => $request->user_id,
        ];

        $user = Sentinel::findById($id);
        $user->update($data);
        
        return redirect()->route('superAdmin.client.list');
    }

    public function index()
    {
        $role = Sentinel::findRoleById(4);
        $clients = $role->users()->with('roles')->get();
        return view('pages.superAdmin.client.list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => $request->password,
        ];
        // dd($data);

        $user = Sentinel::registerAndActivate($data);
        $role = Sentinel::findRoleBySlug('client');
        $user->roles()->attach($role);

        return redirect()->route('superAdmin.client.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::find($id);
        return view('pages.superAdmin.client.form', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        $user = Sentinel::findById($id);
        $user->update($data);
        
        return redirect()->route('superAdmin.client.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::find($id);
        $client->delete();
        return redirect()->route('superAdmin.client.list');
    }
}
