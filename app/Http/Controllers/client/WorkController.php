<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Work;
use App\User;
use Sentinel;
use Storage;
use App\Notifications\DokPerFisikNotificationEmail;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadCurvaS($id)
    {
        
        $order = Order::find($id);
        // dd($order);
        // $work = Work::all();
        // $work = Work::where('order_id','=',$order->id)->first();
        // $work = Work::where('order_id','=',$id)->get();
        // dd($work);
        // dd($order);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.client.work.curvaS', compact('work','order'));
    }

    


    
    public function index()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::doesntHave('work');
        // $temporder = Order::where('state','=',1);
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.work.addCurva', compact('order'));
        
    }

    public function index_curva()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::has('work');
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.work.list', compact('order'));
        
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
                
                $user = User::where('id','=',2)->first();
                $user->notify(new DokPerFisikNotificationEmail($work));
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
        // dd($id);
        $order = Order::find($id);
        // dd($order);
        $work = Work::where('order_id','=',$order->id)->first();
        // dd($work);

        return view('pages.client.work.curvaS', compact('order','work'));

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
                $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/work/client', $uploadedFileName);    
                $data = [
                    'order_id' => $request->order_id,
                    'curva_s' => $path,
                ];

                $work->fill($data)->save();
                // dd($order);
                
                $user = User::where('id','=',2)->first();
                $user->notify(new DokPerFisikNotificationEmail($work));

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
