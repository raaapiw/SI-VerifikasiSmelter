@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($docper) ? 'Edit Tahun Pekerjaan': 'docper Tahun Pekerjaan'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($docper) ? 'Edit Tahun Pekerjaan':'docper Tahun Pekerjaan'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($docper) ? route('admin.docper.update1', $docper->id) : route('admin.docper.store1')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{ $order->id}}">
                    <div class="form-body">
                        <h3 class="card-title">Company Info</h3>
                        <hr>
                        <div class="row p-t-20">
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
                                    <label for="name1">Address :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$order->client->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1">Phone :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$order->client->phone}}">
                                </div>
                            </div>
                            <br>
                        </div>
                        <hr>
                        <div id="dynamic_field">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center>
                                            <div class="form-group">
                                                <h4 class="card-title">Nama File</h4>
                                                <input type="text" class="form-control" id="nameFile" name="name[]" required/>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button name="add" id="add" type="button" class="btn btn-block btn-info" data-count=0>Tambah</button>
                        <br>
                        <div class="form-actions">
                                <button type="submit" class="btn btn-success" value="docper"> Submit </button></a>
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
            var i = 0;
            // i = $(this).attr("data-count");
            // console.log(i);
            $(document).on("click","#add",function() {
                $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-12"><div class="form-group"><center><div class="form-group"><h4 class="card-title">Nama File</h4><input type="text" class="form-control" id="nameFile" name="name[]" required/></div></center></div><div class="col-md-12"><div class="form-group"><button type="button" name="btn_remove" id="'+i+'" class="btn btn-danger btn_remove">Clear</button></div></div></div></div>');
                i++;
                // $(".select2").select2();
                // $(".vertical-spin").TouchSpin({
                //     verticalbuttons: true,
                //     verticalupclass: 'ti-plus',
                //     verticaldownclass: 'ti-minus',
                // });
            });
            
            $(document).on("click", ".btn_remove", function(){  
                   var button_id = $(this).attr('id');   
                   $('#row'+button_id+'').remove();  
            });
    
            
         });
</script> 
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>


  
@endsection