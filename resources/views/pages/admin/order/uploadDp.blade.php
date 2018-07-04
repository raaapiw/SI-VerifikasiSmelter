@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($order->offer_letter) ? 'Edit Invoice DP': 'Upload Invoice DP'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($order->offer_leter) ? 'Edit Invoice DP':'Upload Invoice DP'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($order->offer_letter) ? route('admin.order.update', $order-> id) : route('admin.order.store')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{ $order-> id}}">
                    <div class="form-body">
                        <h3 class="card-title">Company Info</h3>
                        <hr>
                        <div class="row p-t-20">
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
                                    <label for="name1">Address :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$order->client->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1">Phone :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$order->client->phone}}">
                                </div>
                            </div>
                            <br>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('doctor.patient.detail', $registration->patient->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                </div>
                            </div> --}}
                        </div>
                        <h3 class="box-title m-t-40">Upload Invoice DP</h3>
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">File Invoice DP</h4>
                                    <input type="file" id="file" name="offer_letter" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')
<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 


  
@endsection