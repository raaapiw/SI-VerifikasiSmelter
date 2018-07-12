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
    public function contract($id)
    {
        $order = Order::find($id);
        return view('pages.admin.order.contract', compact('order'));
    }
    public function addOffer(){
        // $tempclient = Client::doesntHave('order');
        $order = Order::where('state','=',0)->get();
        // dd($order);
        // $client = $tempclient->where('state','=',0)->get();
        // dd($client);
        // $orders = Order::where('letter_of_request','!=',null)->get(); 
        return view('pages.admin.order.addOffer', compact('order'));
    }

    public function uploadOffer($id)
    {
        //

        $order = Order::find($id);
        // dd($client);
        // dd($client);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.order.uploadOffer', compact('order'));
    }

    public function editOffer($id)
    {
        $order = Order::find($id);
        // dd($client);
        return view('pages.admin.order.uploadOffer', compact('order'));
    
    }

    // public function addDp(){
    //     // $akun = Order::where(Sentinel::getUser()->name, '=', $order->client->name)->get();
    //     // dd($akun);
    //     $orders = Order::where(c)->get(); 
    //     return view('pages.admin.order.addDp', compact('orders'));
    // }

    public function proceed($id)
    {
        $order = Order::find($id)->first();
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.order.proceed', compact('order'));
    }
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

    public function detail($id)
    {
        //
        $order = Order::find($id);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.order.detail', compact('order'));
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
                    'client_id' => $request->client_id,
                    'offer_letter' => $path,
                ];
                // dd($data);
                $order = Order::create($data);
                // dd($order);
                return redirect()->route('admin.dashboard');
            
            
             
           
            
        } elseif (isset($request->dp_invoice)){
            $uploadedFile = $request->file('file');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'client_id' => $request->client_id,
                    'dp_invoice' => $path,
                ];    
           
            $order = Order::create($data);
        
            return redirect()->route('admin.dashboard');
           
        }elseif (isset($request->spk)){
            $uploadedFile = $request->file('file');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'client_id' => $request->client_id,
                    'spk' => $path,
                    'state' => 0,
                ];    
           
            $order = Order::create($data);
        
            return redirect()->route('admin.dashboard');
           
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
        $order = Order::find($id);
        if (isset($request->offer_letter)){
            $rules = [
                'offer_letter'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('offer_letter');
                $uploadedFileName = $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->store('public/files/'.$uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'offer_letter' => $path,
                ];
                $order->fill($data)->save();

                // $order = Order::update($data);
        
                return redirect()->route('admin.dashboard');
           
            
        } elseif (isset($request->dp_invoice)){
            $uploadedFile = $request->file('dp_invoice');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'client_id' => $request->client_id,
                    'dp_invoice' => $path,
                ];    
                $order->fill($data)->save();
           
            // $order = Order::update($data);
        
            return redirect()->route('admin.dashboard');
           
        }elseif (isset($request->spk)){
            $uploadedFile = $request->file('spk');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'client_id' => $request->client_id,
                    'spk' => $path,
                    'state' => 1,
                ];    
                $order->fill($data)->save();
            // $order = Order::update($data);
        
            return redirect()->route('admin.dashboard');
        }elseif (isset($request->contract)){
            $uploadedFile = $request->file('contract');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'client_id' => $request->client_id,
                    'contract' => $path,
                ];    
                $order->fill($data)->save();
            // $order = Order::update($data);
        
            return redirect()->route('admin.dashboard');
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
