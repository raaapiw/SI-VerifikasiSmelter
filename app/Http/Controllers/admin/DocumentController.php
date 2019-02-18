<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Order;
use App\Document;
use App\Work;
use App\Client;
use Sentinel;
// use Work;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_doc()
    {
        //
        $order = Order::has('work')->get();
        // dd($order);
        // $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        // $temporder = Order::has('works');
        // $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::all();
        // dd($work);
        return view('pages.admin.work.listDoc', compact('order'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $order = Order::find($id);
        $work  = Work::where('order_id','=',$order->id)->first();
        $document = Document::where('work_id','=',$work->id)->get();
        // dd($document);

        return view('pages.admin.work.detail', compact('document','order','work'));

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
    public function create($id)
    {
        //
        $order = Order::find($id);
        $work = Work::where('order_id', '=',$id)->first();


        return view('pages.admin.fisik.formName1', compact('order','work'));
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
        $arrayName = $request->name;
        foreach($arrayName as $index=>$row){
            $data = [       
                'work_id' => $request->work_id,
                'type' =>$arrayName[$index],
                
            ];
            
            $document = Document::create($data);
        }

        return redirect()->route('admin.dashboard');
        
        
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
        $document = Document::find($id);
        // dd($docper);
        $order = Order::where('id','=',$document->work->order_id)->first();
        // dd($order);
        $work = Work::where('order_id','=',$order->id)->first();


        return view('pages.admin.fisik.edit', compact('order','document','work'));
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
        
        $data = [       
                'order_id' => $request->order_id,
                'type' =>$request->type
                
            ];
            
            $document->fill($data)->save();
        

        return redirect()->route('admin.dashboard');
    
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
        $document = Document::find($id)->delete();
        
        return redirect()->route('admin.dashboard');
    }
}
