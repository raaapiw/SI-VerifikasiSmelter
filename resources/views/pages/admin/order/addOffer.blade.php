@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Surat Penawaran</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Surat Penawaran</li>
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
                            <th>Date</th>
                            <th style="width : 30%">Company Name</th>
                            <th style="width : 10%">Surat Penawaran</th>
                            <th style="width : 10%">Status Penawaran</th>
                            <th style="width : 10%">Invoice DP</th>
                            <th style="width : 10%">Accept Pemesanan</th>
                            <th style="width : 10%">Kontrak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->client->company_name }}</td>
                                <td><center>
                                        <a href="{{ route('admin.order.uploadOffer', $row->id)}}"><span><i class="fa fa-send"></i></span></a>
                                        <a href="{{ Storage::url($row->offer_letter) }}"><span><i class="fa fa-download"></i></span></a></center>
                                </td>
                                <td> {{ isset($row->state_offer) ? Storage::url($row->state_offer) : "Belum Disetujui"}}</td>
                                <td><center>
                                        <a href="{{ route('admin.order.uploadDp', $row->id)}}"><span><i class="fa fa-send"></i></span></a>
                                        <a href="{{ Storage::url($row->dp_invoice) }}"><span><i class="fa fa-download"></i></span></a>
                                    </center>
                                </td>
                                <td class="text-nowrap">
                                    <center>
                                        <a href="{{ route('admin.order.proceed', $row->id)}}" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check m-r-10"></i> </a>
                                        {{-- <a href="#" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a> --}}
                                        <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                        <form action="#" id="delete" method="post">
                                            {{ method_field('DELETE') }} 
                                        </form>
                                        </a>
                                    </center>
                                </td>
                                <td> {{ isset($row->contract) ? Storage::url($row->contract) : "Belum ada kontrak"}}</td>
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