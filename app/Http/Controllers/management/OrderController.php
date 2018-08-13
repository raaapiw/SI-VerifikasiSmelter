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

class OrderController extends Controller
{
    //
    public function list()
    {
        $orders = Order::all();

        return view('pages.management.order.list', compact('orders'));
    }
}
