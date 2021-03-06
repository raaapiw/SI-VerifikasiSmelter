@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($orders->meeting) ? 'Edit Jadwal': 'Upload Jadwal'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($orders->meeting) ? 'Edit Jadwal':'Upload Jadwal'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($meeting) ? route('admin.meeting.update', $meeting->id) : route('admin.meeting.store')}}" method="POST" enctype="multipart/form-data">
                    {{-- @if(isset($meeting))
                        <input type="hidden" name="order_id" value="{{ $meeting->order->id}}">
                    @else 
                    
                    <input type="hidden" name="order_id" value="{{ $order->id}}">
                    @endif --}}
                    <div class="form-body">
                        <h3 class="card-title">Jadwal Meeting</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Company :</label>
                                    @if(isset($meeting))
                                    <input type="text" disabled class="form-control" placeholder="{{$meeting->order->client->company_name}}">
                                    @else
                                    <select id="id" class="form-control custom-select" name="order_id" >
                                        @foreach($order as $row)
                                        <option   value="{{$row->id}}">{{$row->id}} - {{ $row->client->company_name }}</option>                                                                   
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal :</label>
                                    @if(isset($meeting))
                                        <input type="date" class="form-control" id="input" name="date" placeholder="{{$meeting->date}}">
                                    @else
                                    <input type="date" class="form-control" id="input" name="date">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu :</label>
                                    @if(isset($meeting))
                                    <input type="text" class="form-control" id="waktu" name="time" value="{{$meeting->time}}">
                                    @else
                                    <input type="text" class="form-control" id="waktu" name="time" >
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat :</label>
                                    @if(isset($meeting))
                                        <input type="text" class="form-control" id="tempat" name="place" value="{{$meeting->place}}">
                                    @else
                                        <input type="text" class="form-control" id="tempat" name="place">
                                    @endif
                                </div>
                            </div>
                            <br>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('doctor.patient.detail', $registration->patient->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
                            <a class="btn btn-inverse btn-close" href="{{ url()->previous() }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')

<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 


  
@endsection