@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Report</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Report</li>
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
                                <th><center>Jenis Laporan</center></th>
                                <th><center>Action</center></th>
                                <th><center>Video</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td><center>{{ $row->created_at }}</center></td>
                                    <td>{{ $row->order->client->company_name }}</td>
                                    <td><center>
                                        @if ($row->jenis == null)
                                            <a href="{{ route('admin.report.jenis', $row->id)}}"><span><i class="fa fa-plus"></i></span></a>
                                        @else 
                                            
                                            <a href="{{ route('admin.report.jenis', $row->id)}}">{{$row->jenis}}</i></span></a>                                        
                                        @endif
                                        </center>
                                    </td>                                        
                                    <td><center>
                                            <a href="{{ route('admin.report.edit', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a>
                                            <a href="{{ route('admin.report.destroy', $row->id)}}"><span><i class="mdi mdi-delete"></i></span></a>
                                            <a href="{{ Storage::url($row->report) }}"><span><i class="fa fa-download"></i></span></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            @if(isset($row->link))
                                                <a href="{{ $row->link }}"><span><i class="fa fa-eye"></i></span></a>
                                            @else
                                                <span class="label label-warning">Tidak Ada</span>
                                            @endif
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
    "order": [[ 1, "DESC" ]]
});</script>
@endsection