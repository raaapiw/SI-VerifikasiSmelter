<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use Sentinel;
use Storage;
use App\Notifications\SuratPermintaanNotificationEmail;
use App\Notifications\CompanionNotificationEmail;
use App\Notifications\DpInvoiceNotificationEmail;
use App\Notifications\BuktiTransferNotificationEmail;
use App\Notifications\SuratPenawaranNotificationEmail;
use App\Notifications\SpkNotificationEmail;
use App\Notifications\PersetujuanPenawaranNotificationEmail;
use App\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $temporders = Order::where('offer_letter','!=',null);
        $order = $temporders->where('client_id','=',$client->id)->get();
        return view('pages.client.order.offerLetter', compact('order'));
    }
    public function uploadOffer($id)
    {
        //
        $client = Client::where('user_id','=',$id)->first();
        // $order = Order::where('client_id','=',$client->id)->get();
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
                // $user = User::where('id','=',2)->first();
                // dd($user);
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // dd($user);
                return redirect()->route('client.dashboard');
            
            
             
           
            
        } elseif (isset($request->transfer_proof)){
            $uploadedFile = $request->file('transfer_proof');
            $uploadedFile1 = $request->file('spk');
            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/order/client/transfer_proof', $uploadedFileName);
            $uploadedFileName1 = $request->client_id . '-' . $uploadedFile1->getClientOriginalName();
            if (Storage::exists($uploadedFileName1)) {
                Storage::delete($uploadedFileName1);
            }
            $path1 = $uploadedFile1->storeAs('public/files/order/client/spk', $uploadedFileName1);
    
                $data = [
                    'client_id' => $request->client_id,
                    'transfer_proof' => $path,
                    'spk' => $path1,
                    'work' => $request->radio
                ];    
           
            $order = Order::create($data);
            // $user = User::where('id','=',2)->first();
            // $user->notify(new BuktiTransferNotificationEmail($order));
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
                    'work_kind' => $request->radio
                ];    
        //    dd($data);
            $order = Order::create($data);
                // dd($order);
            // $user = User::where('id','=',2)->first();
            // $user->notify(new SpkNotificationEmail($order));
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
        
                // $user = User::where('id','=',2)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // $user = User::where('id','=',3)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // $user = User::where('id','=',5)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // $user = User::where('id','=',7)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // $user = User::where('id','=',50)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
                // $user = User::where('id','=',60)->first();
                // $user->notify(new SuratPermintaanNotificationEmail($order));
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
        
                // $user = User::where('id','=',2)->first();
                // $user->notify(new BuktiTransferNotificationEmail($order));
                // $user1 = User::where('id','=',3)->first();
                // $user1->notify(new BuktiTransferNotificationEmail($order));
                // $user2 = User::where('id','=',5)->first();
                // $user2->notify(new BuktiTransferNotificationEmail($order));
                // $user3 = User::where('id','=',7)->first();
                // $user3->notify(new BuktiTransferNotificationEmail($order));
                // $user4 = User::where('id','=',50)->first();
                // $user4->notify(new BuktiTransferNotificationEmail($order));
                // $user5 = User::where('id','=',60)->first();
                // $user5->notify(new BuktiTransferNotificationEmail($order));
                
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
    
                // $user = User::where('id','=',2)->first();
                // $user->notify(new PersetujuanPenawaranNotificationEmail($order));
                // $user1 = User::where('id','=',3)->first();
                // $user1->notify(new PersetujuanPenawaranNotificationEmail($order));
                // $user2 = User::where('id','=',5)->first();
                // $user2->notify(new PersetujuanPenawaranNotificationEmail($order));
                // $user3 = User::where('id','=',7)->first();
                // $user3->notify(new PersetujuanPenawaranNotificationEmail($order));
                // $user4 = User::where('id','=',50)->first();
                // $user4->notify(new PersetujuanPenawaranNotificationEmail($order));
                // $user5 = User::where('id','=',60)->first();
                // $user5->notify(new PersetujuanPenawaranNotificationEmail($order));
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
    
                // $user = User::where('id','=',2)->first();
                // $user->notify(new SpkNotificationEmail($order));
                // $user1 = User::where('id','=',3)->first();
                // $user1->notify(new SpkNotificationEmail($order));
                // $user2 = User::where('id','=',5)->first();
                // $user2->notify(new SpkNotificationEmail($order));
                // $user3 = User::where('id','=',7)->first();
                // $user3->notify(new SpkNotificationEmail($order));
                // $user4 = User::where('id','=',50)->first();
                // $user4->notify(new SpkNotificationEmail($order));
                // $user5 = User::where('id','=',60)->first();
                // $user5->notify(new SpkNotificationEmail($order));
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
