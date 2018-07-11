<?php

namespace App\Http\Controllers\client;

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
    public function uploadCurvaS($id)
    {
        $client = Client::where('user_id','=',$id)->first();
        $order = Order::where('client_id','=',$client->id)->first();
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.work.curvaS', compact('client','order'));
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
        if (isset($request->curva_s)){
            $rules = [
                'curva_s'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('curva_s');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'order_id' => $request->order_id,
                    'curva_s' => $path,
                ];
                $work = Work::create($data);
                // dd($order);
                return redirect()->route('client.dashboard');
            
            
             
           
            
        } elseif (isset($request->evidence)){
            $uploadedFile = $request->file('evidence');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'order_id' => $request->client_id,
                    'evidence' => $path,
                ];    
                $work = Work::create($data);
        
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
        $work = Work::find($id);
        if (isset($request->curva_s)){
            $rules = [
                'curva_s'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('curva_s');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'order_id' => $request->order_id,
                    'curva_s' => $path,
                ];

                $work->fill($data)->save();
                // dd($order);
                return redirect()->route('client.dashboard');
            
            
             
           
            
        } elseif (isset($request->evidence)){
            $uploadedFile = $request->file('evidence');

                $path = $uploadedFile->store('public/files');
    
                $data = [
                    'order_id' => $request->client_id,
                    'evidence' => $path,
                ];    
           
                $work->fill($data)->save();
        
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
