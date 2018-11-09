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
use App\Draft;
use Sentinel;

class DraftController extends Controller
{
    //
    public function edit($id)
    {
        $draft = Draft::find($id);
        $order = Order::where('id','=', $draft->order_id)->first();

        return view('pages.admin.report.draft', compact('draft','order'));

    }
    public function form($id)
    {
        $order = Order::find($id);
        $draft = Draft::where('order_id','=',$id)->first();
        return view('pages.admin.report.draft', compact('order','draft'));
    }

    public function listDraft()
    {
        $orders = Order::all();
        // dd($orders);

        
        return view('pages.admin.report.listDraft', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $draft = Draft::where('order_id','=',$id)->get();

        return view('pages.admin.report.detailDraft', compact('order','draft'));
    }
    
    public function storeDraft(Request $request)
    {
        //
        if (isset($request->evidence)){
            $rules = [
                'evidence'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('evidence');
                $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/draft', $uploadedFileName);
    
                $data = [
                    'order_id' => $request->order_id,
                    'evidence' => $path,
                    'type' => $request->type
                ];
                // dd($data);
                $draft = Draft::create($data);
                // dd($draft);
                
                // $user = User::where('id','=',2)->first();
                // $user->notify(new DokPerFisikNotificationEmail($work));

                return redirect()->route('admin.report.listDraft'); 
        
        } 
    }

    public function updateDraft(Request $request, $id)
    {
        //
        $draft = Draft::find($id);
        if (isset($request->evidence)){
            $rules = [
                'evidence'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('evidence');
                $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/draft', $uploadedFileName);    
                $data = [
                    'order_id' => $request->order_id,
                    'evidence' => $path,
                    'type' => $request->type
                ];

                $draft->fill($data)->save();
                // dd($order);
                
                $user = User::where('id','=',2)->first();
                $user->notify(new DokPerFisikNotificationEmail($work));

                return redirect()->route('client.dashboard'); 
        } 
    }
}
