@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Edit Dokumen</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Edit Foto Lapangan</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{  route('client.docper.update',$other->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="{{$other->order_id}}">
                    <div class="form-body">
                        <h3 class="box-title m-t-40">Upload Foto Lapangan</h3>
                        <hr>
                        <div id="dynamic_field">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h4 class="card-title">Nama File</h4>
                                            <input type="text" class="form-control" id="nameFile" name="type" required/ placeholder="{{$other->type}}">
                                        </div>
                                        <div>
                                        <h4 class="card-title">File Foto<font color="red">*</font></h4>
                                            <input type="file" id="file" name="pics[]" class="dropify" required/>
                                            <br>
                                            <p><font color="red">* jika file foto lebih dari 1 atau di dalam folder harus di .rar/.zip terlebih dahulu</font></p>
                                        </div>
                                    </div>
                                </div>
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
            $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-12"><div class="card"><div class="card-body"><div class="form-group"><h4 class="card-title">Nama File</h4><input type="text" class="form-control" id="nameFile" name="type[]" required/></div><h4 class="card-title">File Foto</h4><input type="file" id="file" name="pics[]" class="dropify" required/><br><p><font color="red">* jika file foto lebih dari 1 atau di dalam folder harus di .rar/.zip terlebih dahulu</font></p></div><div class="col-md-12"><div class="form-group"><button type="button" name="btn_remove" id="'+i+'" class="btn btn-danger btn_remove">Clear</button></div></div></div></div></div>');
            i++;
            // $(".select2").select2();
            // $(".vertical-spin").TouchSpin({
            //     verticalbuttons: true,
            //     verticalupclass: 'ti-plus',
            //     verticaldownclass: 'ti-minus',
            // });
        });
        
        // $(document).on('click', '.btn_remove', function(){  
        //        var button_id = $(this).attr("id");   
        //        $('#row'+button_id+'').remove();  
        // });
        // $(".select2").select2();
        // $(".vertical-spin").TouchSpin({
        //     verticalbuttons: true,
        //     verticalupclass: 'ti-plus',
        //     verticaldownclass: 'ti-minus'
        // });
     });
    </script> 


  
@endsection