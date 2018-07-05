@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Pemesanan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Pemesanan</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="width:50%"><center>Nama Perusahaan</center></th>
                                <th><center>Upload Berita Acara</center></th>
                                <th><center>Adakan Meeting ?</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->client->company_name }}</td>
                                    <td><center>
                                            <a href="#"><span><i class="fa fa-send"></i></span></a>
                                        </center>
                                    </td>
                                    <td><center>
                                        <a href="#" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check m-r-10"></i> </a>
                                        {{-- <a href="#" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a> --}}
                                        <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                        <form action="#" id="delete" method="post">
                                            {{ method_field('DELETE') }} 
                                        </center>
                                    </td>
                                </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 1, "desc" ]]
});</script>
@endsection