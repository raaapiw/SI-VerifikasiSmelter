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
                <form action="{{ route('admin.order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="client_id" value="{{ $order->client->id}}">
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
                            <table id="myTable" class="table table-bordered table-striped">
                                <tr>
                                    <thead>
                                        <th>Bukti Transfer</th>
                                        <th>SPK</th>
                                    </thead>
                                </tr>
                                <tr>
                                    @if(isset($order->transfer_proof))
                                    <td>
                                        <center><a href="{{ Storage::url($order->transfer_proof) }}"><span><i class="fa fa-download"></i></span></a></center>
                                    </td>
                                    @else
                                    <td>
                                        BUKTI TRANSFER BELUM ADA !
                                    </td>
                                    @endif
                                    @if(isset($order->spk))
                                    <td>
                                        <center><a href="{{ Storage::url($order->spk) }}"><span><i class="fa fa-download"></i></span></a></center>
                                    </td>             
                                    @else
                                    <td>
                                        SPK BELUM ADA !
                                    </td>
                                    @endif
                                </tr>
                            </table>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ Storage::url($order->transfer_proof) }}"><span><i class="fa fa-info-circle">Bukti Transfer</i></span></a>
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <a href="{{ Storage::url($order->transfer_proof) }}"><span><i class="fa fa-info-circle">Bukti Transfer</i></span></a>
                            </div> --}}
                        <div class="form-actions">
                                <button type="submit" class="btn btn-success" value="upload"> Proceed </button></a>
                            <a class="btn btn-inverse btn-close" href="{{ url()->previous() }}">Cancel</a>
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
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>


  
@endsection