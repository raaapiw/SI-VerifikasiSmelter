@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
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
                                <th><center>No</center></th>
                                <th><center>Date</center></th>
                                <th><center>Company Name</center></th>
                                <th><center>Jenis Laporan</center></th>
                                <th><center>Bulan Pekerjaan</center></th> 
                                <th><center>Tahun Pekerjaan</center></th>                                
                                <th><center>Detail</center></th>
                                <th><center>Hapus</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td><center>{{ $row->created_at }}</center></td>
                                    <td>{{ $row->client->company_name }}</td>
                                    {{-- {{dd($row->report)}} --}}
                                    @if (!empty($row->report->jenis))
                                        <td><center>{{ $row->report->jenis }}</center></td>
                                    @else
                                        <td><center> - </center></td>
                                    @endif
                                    @if (!empty($row->month))
                                        <td><center><a href="{{ route('admin.order.year', $row->id)}}">{{ $row->month }}</a></center></td>
                                    @else
                                        <td><center><a href="{{ route('admin.order.year', $row->id)}}"><span><i class="fa fa-plus"></i></span></a><center></td>
                                    @endif
                                    @if (!empty($row->year))
                                        <td><center><a href="{{ route('admin.order.year', $row->id)}}">{{ $row->year }}</a></center></td>
                                    @else
                                        <td><center><a href="{{ route('admin.order.year', $row->id)}}"><span><i class="fa fa-plus"></i></span></a><center></td>
                                    @endif
                                    <td><center>
                                            <a href="{{ route('admin.order.detail', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center><a href="{{ route('admin.order.destroy', $row->id)}}"><span><i class="mdi mdi-delete"></i></span></a><center>   
                                    </td>  
                                </tr>                            
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Company Name</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Bulan Pekerjaan</th>
                                <th>Tahun Pekerjaan</th>
                                <th style="display:none;">Detail</th>
                                <th style="display:none;">Hapus</th>
                            </tr>
                        </tfoot>
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
<script type="text/javascript" class="init">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#myTable tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#myTable').DataTable();
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>
{{-- <script>$('#myTable').DataTable({
    "order": [[ 1, "DESC" ]]
});</script> --}}
{{-- <script src="{{ asset('material/plugins/jquery-datatables-editable/jquery.dataTables.js')}}"></script> --}}
<script src="{{ asset('material/plugins/datatables/dataTables.bootstrap.js')}}"></script>
{{-- <script src="{{ asset('material/plugins/tiny-editable/mindmup-editabletable.js')}}"></script> --}}
{{-- <script src="{{ asset('material/plugins/tiny-editable/numeric-input-example.js')}}"></script> --}}
{{-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
{{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
{{-- <script type="text/javascript" language="javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> --}}

{{-- <script>
    $('#myTable').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
        // $('#myTable').editableTableWidget().numericInputExample().find('td:first').focus();
</script> --}}
@endsection