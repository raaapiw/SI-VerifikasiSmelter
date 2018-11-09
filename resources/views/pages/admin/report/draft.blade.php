@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($draft) ? 'Edit Draft Laporan': 'Draft Laporan'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($draft) ? 'Edit Draft Laporan':'Draft Laporan'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($draft) ? route('admin.report.updateDraft', $draft->id) : route('admin.report.storeDraft') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="form-body">
                        <h3 class="box-title m-t-40">Upload Draft Laporan</h3>
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nama Dokumen</h4>
                                    <input type="number" class="form-control" id="nameFile" name="type" placeholder="isikan nomor"required/>
                                    <br>
                                    <br>
                                    <br>
                                    <h4 class="card-title">File Draft Laporan</h4>
                                    <input type="file" id="file" name="evidence" class="dropify" required/>
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