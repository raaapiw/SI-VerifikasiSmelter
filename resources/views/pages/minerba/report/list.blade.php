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
                                <th><center>Bulan Pekerjaan</center></th>
                                <th><center>Tahun Pekerjaan</center></th>
                                <th style="width:50%"><center>Company Name</center></th>
                                <th><center>Download Laporan</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($reports))
                            @foreach($reports as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    @if (!empty($row->order->month))
                                        <td><center>{{ $row->order->month }}</a></center></td>
                                    @else
                                        <td><center>-</center></td>
                                    @endif
                                    @if (!empty($row->order->year))
                                        <td><center>{{ $row->order->year }}</a></center></td>
                                    @else
                                        <td><center>-</center></td>
                                    @endif 
                                    <td>{{ $row->order->client->company_name }}</td>
                                    <td><center>
                                            @if($row->order->state_report == 1)
                                                <a href="{{ Storage::url($row->report) }}"><span><i class="fa fa-download"></i></span></a>
                                            @else
                                                <span class="label label-warning">ON PROCESS</span>
                                            @endif
                                        </center>
                                    </td>
                                </tr>                            
                            @endforeach
                            @endif
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