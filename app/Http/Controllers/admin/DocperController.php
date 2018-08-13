<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Work;
use App\Docper;
use Sentinel;

class DocperController extends Controller
{
    //
    public function detail($id)
    {
        $order = Order::find($id);
        $docper = Docper::where('order_id','=',$id)->get();
        // dd($docper);

        return view('pages.admin.work.detailDocper', compact('docper','order','work'));
    }

    public function list()
    {
        $orders = Order::has('docpers')->get();
        // dd($orders);

        return view('pages.admin.work.listDocper', compact('orders'));
    }
}
