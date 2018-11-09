@extends('layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Draft Detail</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            
            <li class="breadcrumb-item"><a href="#">Draft</a></li>
            <li class="breadcrumb-item active">Draft Detail</li>
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
                <label>Draft History</label>
                {{--  Table Diagnosis  --}}
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th><center>Tanggal</center></th>
                            <th><center>Draft ke-</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($draft as $key=>$row)
                            <tr>
                                <td><center>{{$key+1}}</center></td>
                                <td><center>{{ $row->created_at }}</center></td>  
                                <td><center>{{ $row->type }}</center></td>                                                  
                                <td><center>
                                        <center><a href="{{ Storage::url($row->evidence) }}"><span><i class="fa fa-download"></i></span></a></center>
                                        
                                        <a href="{{ route('admin.report.editDraft', $row->id)}}" aria-expanded="false"><i class="fa fa-pencil"></i></a>
                                    </center>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <a class="btn btn-success " href="{{ route('admin.report.formDraft', $order->id)}}">+ Tambah Draft</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script>$('#myTable').DataTable({
        "order": [[ 1, "DESC" ]]
    });</script>
  
@endsection