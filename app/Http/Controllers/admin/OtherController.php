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
        $order = Order::all();
        // dd($order);

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
    
    public function detailPics($id){
        $order = Order::find($id);
        $other = Other::where('order_id','=',$id)->get();

        return view ('pages.admin.other.detailPics', compact('order','other'));
    }

    public function editPics($id){
        $other = Other::find($id);

        return view('pages.admin.other.editPics', compact('other'));
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
        
        return redirect()->route('admin.other.listPics');
    }

    public function updatePics(Request $request, $id){
        $other = Other::find($id);
        $arrayFile = $request->file('pics');
        // return dd($arrayFile);
        foreach ($arrayFile as $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->work_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/order/picture', $uploadedFileName);

            $data = [       
                'order_id' => $request->order_id,
                'evidence' => $path, 
                'type' => $request->type,
            ];
            $other->fill($data)->save();

            return redirect()->route('admin.other.listPics');
        }
    }

    public function addLetter(){
        $order = Order::where('dirkom','=', null)->get();

        return view ('pages.admin.other.addLetter', compact('order'));
    }

    public function formLetter($id){
        $order = Order::find($id);

        return view ('pages.admin.other.formLetter', compact('order'));

    }

    public function updateDir(Request $request, $id){
        $order = Order::find($id);

        $uploadedFile = $request->file('dirkom');
            $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            $path = $uploadedFile->storeAs('public/files/order/admin/dirkom', $uploadedFileName);

                $data = [
                    'client_id' => $request->client_id,
                    'dirkom' => $path,
                ];    
                $order->fill($data)->save();
                return redirect()->route('admin.other.listPics');
    }

    public function destroyPics($id)
    {
        //
        
        $other = Other::find($id)->delete();
        
        return redirect()->route('admin.other.listPics');
    }

    public function destroyDir($id)
    {
        //
        
        $temporder = Order::find($id);
        $order = $temporder->where('dirkom')->delete();
        
        return redirect()->route('admin.other.listPics');
    }
}
