@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Upload Dokumen</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Upload Dokumen</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{route('client.docper.store')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="form-body">
                        <h3 class="box-title m-t-40">Upload Dokumen Perencanaan</h3>
                        <hr>
                        <div id="dynamic_field">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">                                            
                                            @foreach($upload as $row)
                                            <h4><b><input type="hidden" name="type[]" value="{{$row->pics}}"></b></h4> 
                                                <h3><b>{{$row->pics}}</b></h3>
                                                <input type="file" name="evidence[]" accept=".pdf">
                                                <br>
                                                <br>
                                                {{-- <h4 class="card-title" name= {{$row->pics}}>{{$row->pics}}</h4>
                                                <input type="file" id="file" name="evidence[]" class="dropify" required/> --}}
                                            @endforeach
                                            {{-- <div class="form-group">
                                                <h4 class="card-title">Nama Dokumen</h4>
                                                <input type="text" class="form-control" id="nameFile" name="type[]" required/>
                                            </div>
                                            <h4 class="card-title">Dokumen Perencanaan</h4>
                                            <input type="file" id="file" name="evidence[]" class="dropify" required/> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <button name="add" id="add" type="button" class="btn btn-block btn-info" data-count=0>Tambah Dokumen</button>
                                </center>
                                <br>
                                <br>
                            </div>
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
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 
<script>
    $( document ).ready(function() {
        var i = 0;
        // i = $(this).attr("data-count");
        // console.log(i);
        $(document).on("click","#add",function() {
            $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-12"><div class="card"><div class="card-body"><div class="form-group"><h4 class="card-title">Nama Dokumen</h4><input type="text" class="form-control" id="nameFile" name="type[]" required/></div><h4 class="card-title">File Dokumen Pekerjaan</h4><input type="file" id="file" name="evidence[]" class="dropify" required/></div><div class="col-md-12"><div class="form-group"><button type="button" name="btn_remove" id="'+i+'" class="btn btn-danger btn_remove">Clear</button></div></div></div></div></div>');
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


  
@endsection