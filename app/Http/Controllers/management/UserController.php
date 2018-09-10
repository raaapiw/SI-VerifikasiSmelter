<?php

namespace App\Http\Controllers\management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Order;
use App\Document;
use App\Work;
use App\Client;
use App\User;
use Sentinel;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $order = Order::all();
        $orders = Order::doesntHave('work')->get();
        
        // return dd ($orders);


        $work = work::all();
        // return dd ($work);
        
        
        return view('pages.management.dashboard', compact('order','work'));
    }
    
}
