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
use App\User;
use App\Docper;
use Sentinel;
use App\Notifications\DocPenNotificationEmail;

class DocperController extends Controller
{
    public function doc()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::has('works');
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        $work = Work::all();
        return view('pages.client.dokper.listOrder', compact('order','work'));
    }
    public function addDoc($id)
    {
        $order = Order::find($id);
        // dd($order);
        // dd($work);
        // $document = Docper::all();
        // dd($document);
        return view('pages.client.dokper.addDoc', compact('work','document','order'));
    }
    
    public function index()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.dokper.listOrder', compact('order'));
        
    }
    

    public function index_doc()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::has('works');
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.dokper.listDoc', compact('order'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $order = Order::find($id);
        // dd($document);
        $docper = Docper::where('order_id','=',$id)->get();

        return view('pages.client.dokper.detail', compact('docper','order','work'));

    }
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
        $arrayFile = $request->file('evidence');
        $arrayType = $request->type;
        // return dd($arrayFile);
        // return dd($arrayType);
        
        foreach ($arrayFile as $index => $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->work_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/works/document', $uploadedFileName);
            // return dd($path);

            $data = [       
                'order_id' => $request->order_id,
                'type' =>$arrayType[$index],
                'evidence' => $path, 
            ];
            
            // dd($data);
            $document = Docper::create($data);
            // dd($document);
            
            // $user = User::where('id','=',2)->first();
            // $user->notify(new DocPenNotificationEmail($document));
        }
        
        return redirect()->route('client.dashboard');
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
    public function editDoc($id)
    {
        //

        $document = Docper::find($id);
        // dd($document);

        return view('pages.client.dokper.editDoc', compact('document','order','work'));
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
        $document = Docper::find($id);
        $arrayFile = $request->file('evidence');
        // return dd($arrayFile);
        foreach ($arrayFile as $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->work_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/works/document', $uploadedFileName);

            $data = [       
                'order_id' => $request->order_id,
                'evidence' => $path, 
                'type' => $request->type,
            ];
            $document->fill($data)->save();
            
            // $user = User::where('id','=',2)->first();
            // $user->notify(new DocPenNotificationEmail($document));
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
        
        $document = Docper::find($id)->delete();
        
        return redirect()->route('client.dashboard');
    }
}