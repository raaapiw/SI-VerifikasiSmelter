<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Order;
use App\Client;
use App\Meeting;
use Sentinel;
use Storage;

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
        $order = Order::find($id);
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.admin.meeting.createBA', compact ('order','meetings'));
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

        $orders = Order::all();
        // dd($orders);
        return view('pages.admin.meeting.uploadBA', compact('orders'));
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
                    'client_id' => $request->client_id,
                    'offer_letter' => $path,
                ];
                $meeting = Meeting::create($data);

                // $order = Order::update($data);
        
                return redirect()->route('admin.dashboard');
        
            }else{
                $data=[
                    'date'=> $request->date,
                    'time'=> $request->time,
                    'place'=> $request->place,         
                ];

                Meeting::create($data);
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
                $path = $uploadedFile->store('public/files/meeting/admin', $uploadedFileName);
    
                $data = [
                    'client_id' => $request->client_id,
                    'offer_letter' => $path,
                ];
                $meeting->fill($data)->save();

                // $order = Order::update($data);
        
                return redirect()->route('admin.dashboard');
        
            }else{
                $data=[
                    'date'=> $request->date,
                    'time'=> $request->time,
                    'place'=> $request->place,         
                ];

                $order->fill($data)->save();
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
