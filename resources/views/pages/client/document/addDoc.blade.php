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
                <form action="{{  route('client.document.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="work_id" value="{{$work->id}}">
                    <div class="form-body">
                        <h3 class="box-title m-t-40">Upload Dokumen Pekerjaan</h3>
                        <hr>
                        <div id="dynamic_field">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h4 class="card-title">Pilih Jenis Dokumen</h4> --}}
                                        {{-- <div class="form-group">
                                             <select class="select2" style="width: 100%" name="type[]" >
                                                <option value=1>PERSIAPAN AWAL </option>
                                                <option value=2>PERSIAPAN PROYEK </option>
                                                <option value=3>PELAKSANAAN PROYEK </option>
                                                <option value=4>UTILITAS </option>
                                                <option value=5>INFRASTRUKTUR PENDUKUNG </option>
                                                <option value=6>COMMISIONING & START UP </option>                                                                   
                                            </select>    
                                        </div> --}}
                                        <div class="form-group">
                                            <h4 class="card-title">Nama Dokumen</h4>
                                            <input type="text" class="form-control" id="nameFile" name="type" required/>
                                        </div>
                                        <h4 class="card-title">Dokumen Pekerjaan</h4>
                                        <input type="file" id="file" name="evidence[]" class="dropify" accept="application/rar" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <button name="add" id="add" type="button" class="btn btn-block btn-info" data-count={{ isset($document) ? count($document) : 0 }}>Tambah Dokumen</button>
                                </center>
                                <br>
                                <br>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
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
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 
<script>
    $( document ).ready(function() {
        var i = 0;
        i = $(this).attr("data-count");
        $(document).on("click","#add",function() {
            $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-12"><div class="card"><div class="card-body"><div class="form-group"><h4 class="card-title">Nama Dokumen</h4><input type="text" class="form-control" id="nameFile" name="type" required/></div><h4 class="card-title">File Dokumen Pekerjaan</h4><input type="file" id="file" name="evidence[]" class="dropify" required/></div></div></div></div>');
            i++;
            $(".select2").select2();
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus',
            });
        });
        // $(document).on('click', '.btn_remove', function(){  
        //        var button_id = $(this).attr("id");   
        //        $('#row'+button_id+'').remove();  
        // });
        
     });
    </script> 


  
@endsection