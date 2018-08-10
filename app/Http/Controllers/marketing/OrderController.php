<?php

namespace App\Http\Controllers\marketing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function detail($id)
    {
        //
        $order = Order::find($id);
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.detail', compact('order'));
    }
    public function listSPK()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();
        // dd($orders);
        return view('pages.client.order.listSPK', compact('orders'));
    }
    public function uploadSPK($id)
    {
        //
        $order = Order::find($id);
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.spk', compact('client','order'));
    }

    public function offerLetter()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();
        return view('pages.client.order.offerLetter', compact('orders'));
    }
    public function uploadOffer($id)
    {
        //
        $client = Client::where('user_id','=',$id)->first();
        $order = Order::where('client_id','=',$client->id)->get();
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.uploadOffer', compact('client','order'));
    }

    public function uploadOffer2($id)
    {
        //
        // dd($id);
        $order = Order::find($id);
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.order.uploadOffer2', compact('order'));
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
        return view('pages.client.order.uploadDp', compact('order'));
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
    public function store(Request $request  )
    {
        //
        if (isset($request->letter_of_request)){
            
                $uploadedFile = $request->file('letter_of_request');

                 $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'letter_of_request' => $path,
                    'state' => 0,
                ];

                $order = Order::create($data);
                // dd($order);
                $user = User::where('id','=',2)->first();
                // dd($user);
                $user->notify(new SmelterNotificationEmail($order));
                // dd($user);
                return redirect()->route('client.dashboard');
            
            
             
           
            
        } elseif (isset($request->transfer_proof)){
            $uploadedFile = $request->file('transfer_proof');
            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'transfer_proof' => $path,
                ];    
           
            $order = Order::create($data);
            $user = User::where('id','=',2)->first();
            $user->notify(new TransferProofNotificationEmail($order));
            return redirect()->route('client.dashboard');
           
        } elseif (isset($request->spk)){
            $uploadedFile = $request->file('spk');
            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'spk' => $path,
                ];    
        //    dd($data);
            $order = Order::create($data);
                // dd($order);
            $user = User::where('id','=',2)->first();
            $user->notify(new SpkNotificationEmail($order));
            return redirect()->route('client.dashboard');
           
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
        if (isset($request->letter_of_request)){
            
                $uploadedFile = $request->file('letter_of_request');
                $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'letter_of_request' => $path,
                ];

                $order->fill($data)->save();
        
                $user = User::where('id','=',2)->first();
                $user->notify(new LorNotificationEmail($order));
                return redirect()->route('client.dashboard');
            
            
        } elseif (isset($request->transfer_proof)){
                $uploadedFile = $request->file('transfer_proof');
                $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'transfer_proof' => $path,
                ];    
           
                $order->fill($data)->save();
        
                $user = User::where('id','=',2)->first();
                $user->notify(new TransferProofNotificationEmail($order));
                
                $user1 = User::where('id','=',16)->first();
                $user1->notify(new TransferProofNotificationEmail($order));
                
            return redirect()->route('client.dashboard');
           
        }elseif (isset($request->state_offer)){
            $uploadedFile = $request->file('state_offer');

            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);

                $data = [
                    'client_id' => $request->client_id,
                    'state_offer' => $path,
                ];    
           
                $order->fill($data)->save();
    
                $user = User::where('id','=',2)->first();
                $user->notify(new StateONotificationEmail($order));
            return redirect()->route('client.dashboard');
        }elseif (isset($request->spk)){
            $uploadedFile = $request->file('spk');

            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            $path = $uploadedFile->storeAs('public/files/order/client', $uploadedFileName);

                $data = [
                    'client_id' => $request->client_id,
                    'spk' => $path,
                ];    
           
                $order->fill($data)->save();
    
                $user = User::where('id','=',2)->first();
                $user->notify(new SpkNotificationEmail($order));
            return redirect()->route('client.dashboard');
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
