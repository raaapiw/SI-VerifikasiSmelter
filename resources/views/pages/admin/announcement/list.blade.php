@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Pengumuman</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Pengumuman</li>
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
                                <th style="width:50%"><center>Pengumuman</center></th>
                                <th><center>Author</center></th>
                                <th><center>Status</center></th>
                                <th><center>Action</center></th>
                                <th><center>Live</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($announcement))
                            @foreach($announcement as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->field }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td><center>
                                        @if($row->is_active == 0)
                                            <span class="label label-warning">Tdk Aktif</span>
                                        @else
                                            <span class="label label-success">Aktif</span>
                                        @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>   
                                            <a href="{{ route('admin.announcement.edit', $row->id) }} " data-toggle="tooltip" data-original-title="Edit"><span><i class="fa fa-pencil"></i></span></a>
                                            <a href="{{ route('admin.announcement.destroy', $row->id) }}"><span><i class="mdi mdi-delete" alt="alert" id="sa-params"></i></span></a>
                                        </center>
                                    </td>
                                    <td class="text-nowrap">
                                        <center>
                                                
                                            <a href="#" onclick="$(this).find('#aktif').submit();" data-toggle="tooltip" data-original-title="Accept" method="POST" enctype="multipart/form-data"> <i class="fa fa-check m-r-10"></i>
                                                 <form action="{{ route('admin.announcement.active', $row->id)}}" id="aktif" method="post">
                                                </form>
                                            </a>
                                            
                                            
                                            {{-- <a href="#" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a> --}}
                                            <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                            <form action="#" id="delete" method="post">
                                                {{ method_field('DELETE') }} 
                                            </form>
                                            </a>
                                        </center>
                                    </td>
                                </tr>                            
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.announcement.create')}}"><button class="pull-left btn btn-md btn-rounded btn-success" >+ Tambah Pengumuman</button></a>
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