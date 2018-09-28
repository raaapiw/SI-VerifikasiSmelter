@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Meeting</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Meeting</li>
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
                                <th style="width:50%"><center>Company Name</center></th>
                                <th><center>Tanggal Meeting</center></th>
                                <th><center>Waktu Meeting</center></th>
                                <th><center>Tempat Meeting</center></th>
                                <th><center>Download Berita Acara</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meetings as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->order->client->company_name }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td>{{ $row->place }}</td>
                                    <td><center>
                                        @if($row->bap == null)
                                            <span class="label label-warning">ON PROCESS</span>
                                        @else
                                            <a href="{{ Storage::url($row->bap) }}"><span><i class="fa fa-download"></i></span></a>
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
    "order": [[ 1, "desc" ]]
});</script>
@endsection