@extends('layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Patient Detail</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            
            <li class="breadcrumb-item"><a href="#">Patient</a></li>
            <li class="breadcrumb-item active">Patient Detail</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="#" class="tab-wizard wizard-circle">
                    <!-- Patient Info -->
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Company :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$order->client->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Company Name :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$order->client->company_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Address :</label>
                                    <input type="text" class="form-control" id="date1" disabled value="{{$order->client->address}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1">Phone Number :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$order->client->phone}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
                <hr>
                <label>Patient History</label>
                {{--  Table Diagnosis  --}}
                <table id="myTable" class="table table-bordered table-striped">
                    <tr>
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Surat Permintaan</th>
                            <th>Surat Penawaran</th>
                            <th>Invoices DP</th>
                            <th>Bukti Transfer</th>
                            <th>SPK</th>
                            <th>Kontrak</th>
                        </thead>
                    </tr>
                    <tr>
                        <td>{{ $order->id}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>
                            @if ($order->letter_of_request !== null)
                            <center><a href="{{ Storage::url($order->letter_of_request) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada !
                            @endif
                        </td>
                        <td>
                            @if ($order->offer_letter !== null)
                                <center><a href="{{ Storage::url($order->offer_letter) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($order->dp_invoice !== null)
                            <center><a href="{{ Storage::url($order->dp_invoice) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($order->transfer_proof !== null)
                            <center><a href="{{ Storage::url($order->transfer_proof) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada
                            @endif
                        </td>
                        <td>
                            @if ($order->spk !== null)
                            <center><a href="{{ Storage::url($order->spk) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada
                            @endif
                        </td>  
                        <td>
                            @if ($order->contract !== null)
                            <center><a href="{{ Storage::url($order->contract) }}"><span><i class="fa fa-download"></i></span></a></center>
                            @else
                                Dokumen Tidak ada
                            @endif
                        </td>                     
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>

  
@endsection