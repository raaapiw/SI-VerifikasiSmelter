@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($report) ? 'Edit Laporan': 'Laporan'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($report) ? 'Edit Laporan':'Upload Laporan'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($report) ? route('admin.report.update', $report->id) : route('admin.report.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{$orders->id}}">
                    <input type="hidden" name="client_id" value="{{$orders->client->id}}">
                    <div class="form-body">
                        <h3 class="box-title m-t-40">Upload Laporan</h3>
                        <hr>
                        <div class="col-md-12">
                            @if(isset($report))
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">File Laporan</h4>
                                    <input type="file" id="file" name="report" class="dropify" accept="application/pdf"/>
                                </div>
                            </div>
                            @else
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">File Laporan</h4>
                                    <input type="file" id="file" name="report" class="dropify" accept="application/pdf" required/>
                                </div>
                            </div>
                            @endif    
                            <div class="form-group">
                                <h4 class="card-title">Link Video</h4>
                                <input type="text" class="form-control" id="nameFile" name="link" required placeholder="{{isset($report) ? $report->link : ""}}">
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