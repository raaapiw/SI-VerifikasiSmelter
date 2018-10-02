@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Tambah Dokumen Verifikasi Perencanaan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tambah Dokumen Verifikasi Perencanaan</li>
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
                                <th><center>Date</center></th>
                                <th style="width:50%"><center>Company Name</center></th>
                                <th><center>Detail Foto Lapangan</center></th>
                                <th><center>Action Surat Dirkom</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td><center>{{ $row->created_at }}</center></td>
                                    <td>{{ $row->client->company_name }}</td>
                                    <td><center>
                                            <a href="{{ route('admin.other.detailPics', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
                                        </center>
                                    </td>
                                    <td>
                                        @if($row->dirkom == null)
                                        <center>
                                            <span class="label label-warning">ON PROCESS</span>
                                        </center>
                                        @else
                                        <center>
                                            <a href="{{ route('admin.other.formLetter', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a>
                                            <a href="{{ route('admin.other.destroyDir', $row->id) }}"><span><i class="mdi mdi-delete"></i></span></a>
                                            <a href="{{ Storage::url($row->dirkom) }}"><span><i class="fa fa-download"></i></span></a>
                                        </center>
                                        @endif
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
    "order": [[ 1, "DESC" ]]
});</script>
@endsection