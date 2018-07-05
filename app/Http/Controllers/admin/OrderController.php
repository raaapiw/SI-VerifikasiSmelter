<?php

namespace App\Http\Controllers\admin;

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
    public function addOffer(){
        $orders = Order::where('letter_of_request','!=',null)->get(); 
        return view('pages.admin.order.addOffer', compact('orders'));
    }

    public function uploadOffer($id)
    {
        //
        $order = Order::find($id);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.order.uploadOffer', compact('order'));
    }

    // public function addDp(){
    //     // $akun = Order::where(Sentinel::getUser()->name, '=', $order->client->name)->get();
    //     // dd($akun);
    //     $orders = Order::where(c)->get(); 
    //     return view('pages.admin.order.addDp', compact('orders'));
    // }

    public function uploadDp($id)
    {
        //
        $order = Order::find($id);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.order.uploadDp', compact('order'));
    }
    
    public function listOrder()
    {

        $orders = Order::all();
        // dd($orders);
        return view('pages.admin.order.listOrder', compact('orders'));
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
        if (isset($request->offer_letter)){
            $rules = [
                'offer_letter'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('offer_letter');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'offer_letter' => $path,
                ];

                $order = Order::create($data);
        
                return redirect()->route('admin.order.dashboard');
            
            
             
           
            
        } elseif (isset($request->dp_invoice)){
            $uploadedFile = $request->file('file');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'dp_invoice' => $path,
                ];    
           
            $order = Order::create($data);
        
            return redirect()->route('admin.order.dashboard');
           
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
        if (isset($request->offer_letter)){
            $rules = [
                'offer_letter'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('offer_letter');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'offer_letter' => $path,
                ];

                $order = Order::create($data);
        
                return redirect()->route('admin.order.dashboard');
            
            
             
           
            
        } elseif (isset($request->dp_invoice)){
            $uploadedFile = $request->file('file');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'dp_invoice' => $path,
                ];    
           
            $order = Order::create($data);
        
            return redirect()->route('admin.order.dashboard');
           
        }
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
