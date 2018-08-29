@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Invoice DP</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Invoice DP</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width : 5%">ID</th>
                            <th><center>Date</center></th>
                            <th style="width : 10%"><center>Surat Penawaran</center></th>
                            <th style="width : 10%"><center>Upload Persetujuan</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <center>
                                        <a href="{{ Storage::url($row->offer_letter) }}"><span><i class="fa fa-download"></i></span></a>
                                    </center>
                                </td>
                                <td class="text-nowrap">
                                    <center>
                                        <a href="{{ route('client.offer.uploadOffer2', $row->id)}}" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check m-r-10"></i> </a>
                                        {{-- <a href="#" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a> --}}
                                        
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
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 1, "asc" ]]
});</script>
@endsection