<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use Sentinel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadOffer($id)
    {
        //
        $order = Order::find($id);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.uploadOffer', compact('order'));
    }

    public function listDp()
    {
        //
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        // dd($client);
        // $orders = Order::where([
        //         ['dp_invoice','!=',null],
        //         ['client_id', '=', $client->id]
        //     ])->get(); 

        $temporders = Order::where('dp_invoice','!=',null);
        $orders = $temporders->where('client_id','=',$client->id)->get();
        // return dd($orders);
        return view('pages.client.order.listDp', compact('orders'));
    }

    public function uploadDp($id)
    {
        //
        $order = Order::find($id);
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.uploadOffer', compact('order'));
    }

    public function index()
    {
        //
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();
        return view('pages.client.order.listOrder', compact('orders'));
    
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
        if (isset($request->letter_of_request)){
            $rules = [
                'letter_of_request'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('letter_of_request');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'letter_of_request' => $path,
                ];

                $order = Order::create($data);
        
                return redirect()->route('client.order.dashboard');
            
            
             
           
            
        } elseif (isset($request->transfer_proof)){
            $uploadedFile = $request->file('transfer_proof');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'transfer_proof' => $path,
                ];    
           
            $order = Order::create($data);
        
            return redirect()->route('client.order.dashboard');
           
        }
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
