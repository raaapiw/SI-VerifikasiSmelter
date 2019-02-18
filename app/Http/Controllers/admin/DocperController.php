<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Work;
use App\Docper;
use Sentinel;

class DocperController extends Controller
{
    //
    public function index()
    {
        //
        $orders = Order::where('work','=',1)->get();

        return view('pages.admin.dokper.addName1', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $docper = Docper::where('order_id','=',$id)->get();
        // dd($docper);

        return view('pages.admin.work.detailDocper', compact('docper','order','work'));
    }

    public function list()
    {
        $orders = Order::has('docpers')->where('work','=',1)->get();
        // dd($orders);

        return view('pages.admin.work.listDocper', compact('orders'));
    }

    public function store(Request $request)
    {
        //
        
        $arrayName = $request->name;
        foreach($arrayName as $index=>$row){
            $data = [       
                'order_id' => $request->order_id,
                'type' =>$arrayName[$index],
                
            ];
            
            $docper = Docper::create($data);
        }

        return redirect()->route('admin.dashboard');
        
        // dd($data);
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
        $docper = Docper::find($id);
        // dd($docper);
        $order = Order::where('id','=',$docper->order_id)->first();


        return view('pages.admin.dokper.edit', compact('order','docper'));
    }

    public function create($id)
    {
        //
        $order = Order::find($id);


        return view('pages.admin.dokper.formName1', compact('order'));
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
        $docper = Docper::find($id);
        
        $data = [       
                'order_id' => $request->order_id,
                'type' =>$request->type
                
            ];
            
            $docper->fill($data)->save();
        

        return redirect()->route('admin.dashboard');
    }

    public function destroy($id)
    {
        //
        
        $document = Docper::find($id)->delete();
        
        return redirect()->route('admin.dashboard');
    }
}
