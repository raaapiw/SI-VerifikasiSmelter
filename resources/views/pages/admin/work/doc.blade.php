@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dokumen Perencanaan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dokumen Perencanaan</li>
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
                            <th style="width : 30%">Nama Perusahaan</th>
                            <th style="width : 10%">Dokumen Perencanaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($work as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td>{{ $row->order->client->company_name }}</td>
                                <td><center><a href="{{ Storage::url($row->curva_s) }}"><span><i class="fa fa-download"></i></span></a>
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