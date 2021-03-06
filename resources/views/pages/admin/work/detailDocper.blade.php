@extends('layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Company Detail</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            
            <li class="breadcrumb-item"><a href="#">Company</a></li>
            <li class="breadcrumb-item active">Company Detail</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="#" class="tab-wizard wizard-circle">
                    <!-- Patient Info -->
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Company :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$order->client->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Company Name :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$order->client->company_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Address :</label>
                                    <input type="text" class="form-control" id="date1" disabled value="{{$order->client->address}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1">Phone Number :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$order->client->phone}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th><center>Tipe Dokumen</center></th>
                                <th><center>Dokumen</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        @foreach($docper as $row)
                        <tr>
                            <td>{{ $row->id}}</td>
                            <td>{{ $row->created_at}}</td>
                            <td>{{ $row->updated_at}}</td>
                            <td>{{ $row->type}}</td>
                            <td>
                                <center><a href="{{ Storage::url($row->evidence) }}"><span>{{$row->RealNameEvidence}}</span></a></center>
                            </td>  
                            <td><center>
                                    <a href="{{ route('admin.docper.editformName1',$row->id)}}"><span><i class="fa fa-pencil"></i></span></a>
                                    <a href="{{ route('admin.docper.destroy', $row->id) }}"><span><i class="mdi mdi-delete"></i></span></a>
                                </center>
                            </td>                 
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    <br>
                    <a href="{{route('admin.docper.formName1', $order->id)}}">
                        <button type="button" class="btn btn-success" value="upload"><i class="fa fa-plus"></i> Tambah Nama Dokumen</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable({
        "order": [[ 1, "desc" ]]
    });</script>
  
@endsection