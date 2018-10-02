<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Order;
use App\Client;
use App\Work;
use App\Other;
use App\Docper;
use Sentinel;

class OtherController extends Controller
{
    //
    public function listPics(){
        $order = Order::has('other')->get();
        

        return view ('pages.admin.other.list', compact('order'));
    }

    public function addPics(){
        $order = Order::doesntHave('others')->get();
        // dd($order);
        return view ('pages.admin.other.addPics', compact('order'));
    }

    public function formPics($id){
        $order = Order::find($id);

        return view ('pages.admin.other.formPics', compact('order'));
    }

    public function store(Request $request){
        $arrayFile = $request->file('pics');
        $arrayType = $request->type;
        // return dd($arrayFile);       
        // return dd($arrayType);
        
        foreach ($arrayFile as $index => $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/order/picture', $uploadedFileName);
            // return dd($path);

            $data = [       
                'order_id' => $request->order_id,
                'type' =>$arrayType[$index],
                'pics' => $path, 
            ];
            
            // dd($data);
            $other = Other::create($data);
            // dd($document);
            
            // $user = User::where('id','=',2)->first();
            // $user->notify(new DokumenPerencanaanNotificationEmail($docper));
            
            // $user = User::where('id','=',2)->first();
            // $user->notify(new DocPenNotificationEmail($document));
        }
        
        return redirect()->route('admin.dashboard');
    }
}
