<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Document;
use App\Work;
use App\Client;
use Sentinel;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDoc($id)
    {
        $order = Order::where('id','=',$id)->first();
        // dd($order);
        $work  = Work::where('order_id','=',$order->id)->first();
        // dd($work);
        // $document = Document::where('work_id','=',$work->id)->first();
        // dd($document);
        return view('pages.client.work.addDoc', compact('work','document'));
    }
    public function index()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $orders = Order::where('client_id','=',$client->id)->get();
        return view('pages.client.work.listOrder', compact('orders'));
        
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
        $uploadedFile = $request->file('evidence[]');
        $uploadedFileName = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->store('public/files/'.$uploadedFileName);

        foreach ($path as $index => $row) {            
            $data = [       
                'work_id' => $prescription->id,
                'evidence' => $path[$index], 
            ];
            $document = Document::create($data);    
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
        $document = Document::find($id);
        $uploadedFile = $request->file('evidence');
        $uploadedFileName = $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->store('public/files/'.$uploadedFileName);

        foreach ($path as $index => $row) {            
            $data = [       
                'work_id' => $request->work_id,
                'evidence' => $path[$index], 
            ];
            $document = Document::create($data);   
            
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
