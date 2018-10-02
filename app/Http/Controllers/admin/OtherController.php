<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Work;
use App\Other;
use App\Docper;
use Sentinel;

class OtherController extends Controller
{
    //
    public function list(){

    }

    public function addPics(){
        $order = Order::doesntHave('others')->get();
        // dd($order);
        return view ('pages.admin.other.addPics', compact('order'));
    }

    public function formPics(){
        
    }
}
