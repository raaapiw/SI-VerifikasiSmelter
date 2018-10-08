<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Meeting;
use App\User;
use Sentinel;
use Storage;
use App\Notifications\MeetingNotificationEmail;
use App\Notifications\BeritaAcaraNotificationEmail;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createSchedule()
    { 
        
        $orders = Order::all();
        // dd($orders);
        return view('pages.admin.meeting.schedule', compact ('clients','meetings','orders'));
    }

    public function editSchedule()
    {
        
    }

    public function createBA($id)
    {
        $meeting = Meeting::find($id);
        
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.meeting.createBA', compact ('order','meeting'));
    }

    

    public function listMeeting()
    {
        
        $orders = Order::all();
        $meetings = Meeting::all();
        // dd($orders);
        return view('pages.admin.meeting.list', compact ('orders','meetings'));
    }

    public function uploadBA()
    {

        $meetings = Meeting::where('bap','=',null)->get();
        // dd($orders);
        return view('pages.admin.meeting.uploadBA', compact('orders','meetings'));
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
        if (isset($request->bap)){
            $rules = [
                'bap'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('bap');
                $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->store('public/files/meeting/admin', $uploadedFileName);
    
                $data = [
                    'order_id' => $request->order_id,
                    'client_id' => $request->client_id,
                    'bap' => $path,
                    
                ];
                $meeting = Meeting::create($data);
                
                $order = Order::where('id','=',$meeting->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();
                // dd($client);
                $user = User::where('id','=',$client->user_id)->first();
                $user->notify(new BeritaAcaraNotificationEmail($meeting));
                // $order = Order::update($data);
        
                return redirect()->route('admin.dashboard');
        
            }else{
                $data=[
                    'admin_id' =>Sentinel::getUser()->id,
                    'order_id' => $request->order_id,
                    'date'=> $request->date,
                    'time'=> $request->time,
                    'place'=> $request->place,         
                ];
                // dd($data);
                $meeting = Meeting::create($data);
               
                $order = Order::where('id','=',$request->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();
                // dd($client);
                
                // Meeting::create($data);
                $user = User::where('id','=',$client->user_id)->first();
                $user->notify(new MeetingNotificationEmail($meeting));
                $user1 = User::where('id','=',2)->first();
                $user1->notify(new MeetingNotificationEmail($meeting));
                return redirect()->route('admin.dashboard');
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
        $meeting = Meeting::find($id);
        if (isset($request->bap)){
            $rules = [
                'bap'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('bap');
                $uploadedFileName = $request->order_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/meeting/admin', $uploadedFileName);
    
                $data = [
                    'order_id' => $request->order_id,
                    'client_id' => $request->client_id,
                    'bap' => $path,
                ];
                // dd($data);
                $meeting->fill($data)->save();
                // dd($meeting);
                $order = Order::where('id','=',$meeting->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();
                // dd($client);
                $user = User::where('id','=',$client->user_id)->first();
                $user->notify(new BeritaAcaraNotificationEmail($meeting));
                // $order = Order::update($data);
        
                return redirect()->route('admin.dashboard');
        
            }else{
                $data=[
                    'order_id' => $request->order_id,
                    'date'=> $request->date,
                    'time'=> $request->time,
                    'place'=> $request->place,         
                ];
                
                $order->fill($data)->save();
                
                $order = Order::where('id','=',$meeting->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();
                // dd($client);
                $user = User::where('id','=',$client->user_id)->first();
                $user->notify(new MeetingNotificationEmail($meeting));
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
