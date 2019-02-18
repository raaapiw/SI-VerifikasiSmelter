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
use Sentinel;
use App\Notifications\DokumenKemajuanFisikNotificationEmail;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doc()
    {
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::has('work');
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        $work = Work::all();
        return view('pages.client.document.listOrder', compact('order','work'));
    }
    public function addDoc($id)
    {
        $order = Order::where('id','=',$id)->first();
        // dd($order);
        $work  = Work::where('order_id','=',$order->id)->first();
        // dd($work);
        $document = Document::all();
        // dd($document);
        return view('pages.client.document.addDoc', compact('work','document'));
    }
    
    public function index()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.document.listOrder', compact('order'));
        
    }
    

    public function index_doc()
    {
        //
      
        $client = Client::where('user_id','=',Sentinel::getUser()->id)->first();
        $temporder = Order::has('work');
        $order = $temporder->where('client_id','=',$client->id)->get();
        // $order = Order::where('client_id','=',$client->id)->get();
        // dd($order);
        // $work  = Work::where('order_id','=',$order->id)->get();
        // dd($work);
        return view('pages.client.document.listDoc', compact('order'));
        
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

        return view('pages.client.document.detail', compact('document','order','work'));

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
                'work_id' => $request->work_id,
                // 'type' =>$arrayType[$index],
                'evidence' => $path, 
            ];
            
            // dd($data);
            $document = Document::create($data);
            // dd($document);
            
            $user = User::where('id','=',2)->first();
            $user->notify(new DokumenKemajuanFisikNotificationEmail($document));
            $user1 = User::where('id','=',3)->first();
            $user1->notify(new DokumenKemajuanFisikNotificationEmail($document));
            $user2 = User::where('id','=',5)->first();
            $user2->notify(new DokumenKemajuanFisikNotificationEmail($document));
            $user3 = User::where('id','=',7)->first();
            $user3->notify(new DokumenKemajuanFisikNotificationEmail($document));
            $user4 = User::where('id','=',50)->first();
            $user4->notify(new DokumenKemajuanFisikNotificationEmail($document));
            $user5 = User::where('id','=',60)->first();
            $user5->notify(new DokumenKemajuanFisikNotificationEmail($document));
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

        $document = Document::find($id);
        // dd($document);

        return view('pages.client.document.editDoc', compact('document','order','work'));
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
                'work_id' => $request->work_id,
                'evidence' => $path, 
            ];
            $document->fill($data)->save();
            
            // $user = User::where('id','=',2)->first();
            // $user->notify(new DokumenKemajuanFisikNotificationEmail($document));
            // $user1 = User::where('id','=',3)->first();
            // $user1->notify(new DokumenKemajuanFisikNotificationEmail($document));
            // $user2 = User::where('id','=',5)->first();
            // $user2->notify(new DokumenKemajuanFisikNotificationEmail($document));
            // $user3 = User::where('id','=',7)->first();
            // $user3->notify(new DokumenKemajuanFisikNotificationEmail($document));
            // $user4 = User::where('id','=',50)->first();
            // $user4->notify(new DokumenKemajuanFisikNotificationEmail($document));
            // $user5 = User::where('id','=',60)->first();
            // $user5->notify(new DokumenKemajuanFisikNotificationEmail($document));
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
        
        $document = Document::find($id)->delete();
        
        return redirect()->route('client.dashboard');
    }
}
