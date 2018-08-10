<?php

namespace App\Http\Controllers\marketing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function dashboard(){
        
        return view('pages.marketing.dashboard');
    }
}
