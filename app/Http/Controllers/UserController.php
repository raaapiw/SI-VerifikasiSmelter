<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Exceptions\User\WrongCredentialException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
use App\User;
use App\Notification;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return redirect()->route('login');
    }

    public function login(){
        return view('login');
    }

    public function newlogin(){
        return view('newlogin');
    }

    public function postLogin(Request $request){
        try{
            Sentinel::authenticate($request->all());
            // dd($request->all());
            if(Sentinel::check()){
                if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                    return redirect()->route('superAdmin.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                    return redirect()->route('admin.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'minerba')
                    return redirect()->route('minerba.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'marketing')
                    return redirect()->route('marketing.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'management')
                    return redirect()->route('management.dashboard');
                else
                    return redirect()->route('client.dashboard');
            }else{
                throw new WrongCredentialException("Username atau Password salah");
            }
        } catch (WrongCredentialException $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        }
    }

    public function postLogout()
    {
        Sentinel::logout();
        return redirect()->route('login');
    }

    public function get() 
    {
        $user = Sentinel::getUser();
        $notifications = $user->unreadNotifications;
        // dd($notifications);
        return $notifications;
    }

    public function read(Request $request){
        Sentinel::getUser()->unreadNotifications()->find($request->id)->markAsRead();
        return 'succes';

    }
}
