<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Work;
use Sentinel;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $order = Order::find($id);
        return view('pages.admin.work.approve', compact('order'));
    }
    
    public function approve()
    {
        $orders = Order::where('state_work','!=',1)->orwhere('state_work','=',null)->get();
        // dd($orders);
        // $orders = Order::has('work')->get();
        // $orders = $temporder->where($temporder->work->state, '=', null)->get();
        // dd($orders);

        return view('pages.admin.work.approve', compact('orders'));
    }

    public function approval($id)
    {
        $order = Order::find($id);
        $work = Work::where('order_id','=',$id)->first();
        // dd($work);

        return view('pages.admin.work.approval', compact('order','work'));
    }

    public function curvaS()
    {
        $work = Work::all();


        return view('pages.admin.work.curvaS', compact('work'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
        $order = Order::find($id);
        $data = [
            'state_work' => $request->state_work,
            'author_work' => Sentinel::getUser()->name
        ];

        // dd($data);
        $order->fill($data)->save();
        // dd($work);
        
        return redirect()->route('admin.dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
