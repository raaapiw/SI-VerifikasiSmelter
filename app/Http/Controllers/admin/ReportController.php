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
use App\User;
use Sentinel;
use App\Notifications\FinalReportNotificationEmail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function approve()
    {
        $temporders = Order::where('state_report','=',null);
        // dd($temporders);
        $orders = $temporders->has('report')->get();
        // $orders = $temporder->where($temporder->work->state, '=', null)->get();
        

        return view('pages.admin.report.approve', compact('orders'));
    }

    public function approval($id)
    {
        $order = Order::find($id);
        
        // dd($work);

        return view('pages.admin.report.approval', compact('order','work'));
    }
    public function jenis($id)
    {
        $report = Report::find($id);
        $order = Order::where('id', '=',$report->order_id)->first();
        
        // dd($work);

        return view('pages.admin.report.jenis', compact('order','report'));
    }
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
        $reports = Report::all();
        return view('pages.admin.report.list', compact('reports'));
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
                    'client_id' => $request->client_id,
                    'order_id' => $request->order_id,
                    'report' => $path,
                    'link' => $request->link
                ];
                // dd($data);
                $report = Report::create($data);
                
                $order = Order::where('id','=',$report->order_id)->first();
                $client = Client::where('id','=',$order->client_id)->first();

                $user8 = User::where('id','=',$client->user_id)->first();
                $user8->notify(new FinalReportNotificationEmail($report));
                $user = User::where('id','=',2)->first();
                $user->notify(new FinalReportNotificationEmail($document));
                $user1 = User::where('id','=',3)->first();
                $user1->notify(new FinalReportNotificationEmail($document));
                $user2 = User::where('id','=',5)->first();
                $user2->notify(new FinalReportNotificationEmail($document));
                $user3 = User::where('id','=',7)->first();
                $user3->notify(new FinalReportNotificationEmail($document));
                $user4 = User::where('id','=',50)->first();
                $user4->notify(new FinalReportNotificationEmail($document));
                $user5 = User::where('id','=',76)->first();
                $user5->notify(new FinalReportNotificationEmail($document));
                $user6 = User::where('id','=',4)->first();
                $user6->notify(new FinalReportNotificationEmail($document));
                $user7 = User::where('id','=',6)->first();
                $user7->notify(new FinalReportNotificationEmail($document));
                // dd($order);
                return redirect()->route('admin.report.listReport');
            }
            // elseif (isset($request->covering_letter)){
            //     $rules = [
            //         'covering_letter'                  => 'required',
            //     ];
                
                
            //         $uploadedFile = $request->file('covering_letter');
            //         $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            //         if (Storage::exists($uploadedFileName)) {
            //             Storage::delete($uploadedFileName);
            //         }
            //         $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
        
            //         $data = [
            //             'order_id' => $request->order_id,
            //             'covering_letter' => $path,
            //         ];
            //         // dd($data);
            //         $report = Report::create($data);
            //         // dd($order);
            //         return redirect()->route('admin.report.listReport');
            //     }elseif (isset($request->receipt)){
            //         $rules = [
            //             'receipt'                  => 'required',
            //         ];
                    
                    
            //             $uploadedFile = $request->file('receipt');
            //             $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            //             if (Storage::exists($uploadedFileName)) {
            //                 Storage::delete($uploadedFileName);
            //             }
            //             $path = $uploadedFile->storeAs('public/files/order/admin', $uploadedFileName);
            
            //             $data = [
            //                 'order_id' => $request->order_id,
            //                 'receipt' => $path,
            //             ];
            //             // dd($data);
            //             $report = Report::create($data);
            //             // dd($order);
            //             return redirect()->route('admin.report.listReport');
            //         }
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
        $report = Report::find($id);
        // dd($report);

        $orders = Order::where('id','=',$report->order_id)->first();
        // $report = Report::where('order_id','=', $id)->get();
        // dd($orders);


        return view('pages.admin.report.create', compact('report','orders'));
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
        // dd($report);
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
                    'link' => $request->link
                ];
                // dd($data);
                $report->fill($data)->save();
                // dd($order);
                return redirect()->route('admin.report.listReport');
            }
            else
            {
                $data = [

                    'link' => $request->link
                ];

                $report->fill($data)->save();

                return redirect()->route('admin.report.listReport');

            }
            // elseif (isset($request->covering_letter)){
            //     $rules = [
            //         'covering_letter'                  => 'required',
            //     ];
                
                
            //         $uploadedFile = $request->file('covering_letter');
            //         $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            //         if (Storage::exists($uploadedFileName)) {
            //             Storage::delete($uploadedFileName);
            //         }
            //         $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
        
            //         $data = [
            //             'order_id' => $request->order_id,
            //             'covering_letter' => $path,
            //         ];
            //         // dd($data);
            //         $report->fill($data)->save();
                
            //         // dd($order);
            //         return redirect()->route('admin.report.listReport');
            //     }elseif (isset($request->receipt)){
            //         $rules = [
            //             'receipt'                  => 'required',
            //         ];
                    
                    
            //             $uploadedFile = $request->file('receipt');
            //             $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
            //             if (Storage::exists($uploadedFileName)) {
            //                 Storage::delete($uploadedFileName);
            //             }
            //             $path = $uploadedFile->storeAs('public/files/report/admin', $uploadedFileName);
            
            //             $data = [
            //                 'order_id' => $request->order_id,
            //                 'receipt' => $path,
            //             ];
            //             // dd($data);
            //             $report->fill($data)->save();
                
            //             // dd($order);
            //             return redirect()->route('admin.report.listReport');
            //         }
                    // elseif (isset($request->kind)){
                        
                        
                    //     $data = [
                    //         // 'order_id' => $request->order_id,
                    //         'jenis' => $request->kind,
                    //     ];
                    //     dd($data);
                    //     $report->update($data);
                
                    //     dd($report);
                    //     return redirect()->route('admin.report.listReport');
                    // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_report(Request $request, $id)
    {
        $order = Order::find($id);
        $report = Report::where('order_id','=',$id);
        $data = [
            
            'client_id' => $request->client_id,
            'state_report' => 1,
            'author_report' => Sentinel::getUser()->name
        ];
       
        // dd($data);
        $order->fill($data)->save();
        return redirect()->route('admin.report.approve');

    }

    public function update_jenis(Request $request, $id)
    {
        $order = Order::find($id);
        $report = Report::where('order_id','=',$id);
        $data = [
            'jenis' => $request->kind,
        ];
       
        // dd($data);
        $report->update($data);
        return redirect()->route('admin.report.listReport');

    }
    public function destroy($id)
    {
        //

        $report = Report::find($id)->delete();
        
        return redirect()->route('admin.report.listReport');
    }
}
