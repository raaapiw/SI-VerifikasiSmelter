@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($order) ? 'Edit Pemesanan': 'Upload Pemesanan'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($order) ? 'Edit Pemesanan':'Upload Pemesanan'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($order) ? route('client.order.update', $order->id) : route('client.order.store')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="client_id" value="{{ $client->id}}">
                    <div class="form-body">
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Jenis Pekerjaan</h4>
                                    <label class="custom-control custom-radio">
                                        <input required id="radio5" name="radio" type="radio" class="custom-control-input" value="1" >
                                        <span class="custom-control-label">Verifikasi Kemajuan Fisik</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio6" name="radio" type="radio" class="custom-control-input" value="0" >
                                        <span class="custom-control-label">Verifikasi Perencanaan</span>
                                    </label>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">File SPK</h4>
                                    <input type="file" id="file" name="spk" class="dropify" accept="application/pdf" required/>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">File Bukti Transfer</h4>
                                    <input type="file" id="file" name="transfer_proof" class="dropify" accept="application/pdf" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
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


  
@endsection