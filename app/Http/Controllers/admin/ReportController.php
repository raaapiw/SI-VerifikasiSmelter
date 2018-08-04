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
use App\Report;
use Sentinel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLetter()
    {
        $report = Report::where('covering_letter','=', null)->get();
        // dd($report);
        return view('pages.admin.report.addLetter', compact('report'));
    }
    public function letter($id)
    {
        $report = Report::find($id);

        return view('pages.admin.report.letter', compact('report'));
    }
    public function listLetter()
    {
        $report = Report::all();

        return view('pages.admin.report.listLetter', compact('report'));
        
    }
    public function addReceipt()
    {
        
        $report = Report::where('receipt','=', null)->get();
        // dd($report);
        return view('pages.admin.report.addReceipt', compact('report'));
    
    }
    public function receipt($id)
    {
        $report = Report::find($id);


        return view('pages.admin.report.receipt', compact('report'));
    }
    public function listReceipt()
    {
        $report = Report::all();

        return view('pages.admin.report.listReceipt', compact('report'));
        
    }
    public function addReport()
    {
        $orders = Order::doesntHave('report')->get();
        // dd($orders);
        return view('pages.admin.report.add', compact('orders'));
    }
    public function index()
    {
        //
        $orders = Order::all();
        return view('pages.admin.report.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // 
        $orders = Order::find($id);
        // dd($orders);
        return view('pages.admin.report.create', compact('orders'));
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
        if (isset($request->report)){
            $rules = [
                'report'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('report');
                $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
    
                $data = [
                    'order_id' => $request->order_id,
                    'report' => $path,
                ];
                // dd($data);
                $report = Report::create($data);
                
                $order = Order::where('id','=',$report->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();

                $user = User::where('id','=',$client->user_id)->first();
                $user->notify(new ReportNotificationEmail($report));
                // dd($order);
                return redirect()->route('admin.dashboard');
            }elseif (isset($request->covering_letter)){
                $rules = [
                    'covering_letter'                  => 'required',
                ];
                
                
                    $uploadedFile = $request->file('covering_letter');
                    $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                    if (Storage::exists($uploadedFileName)) {
                        Storage::delete($uploadedFileName);
                    }
                    $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
        
                    $data = [
                        'order_id' => $request->order_id,
                        'covering_letter' => $path,
                    ];
                    // dd($data);
                    $report = Report::create($data);
                    // dd($order);
                    return redirect()->route('admin.dashboard');
                }elseif (isset($request->receipt)){
                    $rules = [
                        'receipt'                  => 'required',
                    ];
                    
                    
                        $uploadedFile = $request->file('receipt');
                        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                        if (Storage::exists($uploadedFileName)) {
                            Storage::delete($uploadedFileName);
                        }
                        $path = $uploadedFile->storeAs('public/files/order/admin', $uploadedFileName);
            
                        $data = [
                            'order_id' => $request->order_id,
                            'receipt' => $path,
                        ];
                        // dd($data);
                        $report = Report::create($data);
                        // dd($order);
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
        $order = Order::find($id);
        $report = Report::where('order_id','=',$order->id)->get();


        return view('pages.admin.report.add', compact('orders'));
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
        $report = Report::find($id);
        if (isset($request->report)){
            $rules = [
                'report'                  => 'required',
            ];
            
            
                $uploadedFile = $request->file('report');
                $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                if (Storage::exists($uploadedFileName)) {
                    Storage::delete($uploadedFileName);
                }
                $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
    
                $data = [
                    'order_id' => $request->order_id,
                    'report' => $path,
                ];
                // dd($data);
                $report->fill($data)->save();
                // dd($order);
                return redirect()->route('admin.dashboard');
            }elseif (isset($request->covering_letter)){
                $rules = [
                    'covering_letter'                  => 'required',
                ];
                
                
                    $uploadedFile = $request->file('covering_letter');
                    $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                    if (Storage::exists($uploadedFileName)) {
                        Storage::delete($uploadedFileName);
                    }
                    $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
        
                    $data = [
                        'order_id' => $request->order_id,
                        'covering_letter' => $path,
                    ];
                    // dd($data);
                    $report->fill($data)->save();
                
                    // dd($order);
                    return redirect()->route('admin.dashboard');
                }elseif (isset($request->receipt)){
                    $rules = [
                        'receipt'                  => 'required',
                    ];
                    
                    
                        $uploadedFile = $request->file('receipt');
                        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
                        if (Storage::exists($uploadedFileName)) {
                            Storage::delete($uploadedFileName);
                        }
                        $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
            
                        $data = [
                            'order_id' => $request->order_id,
                            'receipt' => $path,
                        ];
                        // dd($data);
                        $report->fill($data)->save();
                
                        // dd($order);
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

        $report = Report::find($id)->delete();
        
        return redirect()->route('client.dashboard');
    }
}
