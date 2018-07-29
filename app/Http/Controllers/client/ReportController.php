<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Order;
use App\Document;
use App\Work;
use App\Client;
use App\Report;
use Sentinel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listLetter()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();

        return view('pages.client.report.listLetter', compact('orders'));
        
    }
    public function listReceipt()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();

        return view('pages.client.report.listReceipt', compact('orders'));
        
    }
     public function index()
    {
        //
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();
        // dd($orders);
        $report = Report::all();
        // $report = Report::where('order_id','=',$orders->id)->get();
        // dd($report);
        return view('pages.client.report.list', compact('orders','report'));
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
