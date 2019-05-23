@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Management</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Management</a></li>
            <li class="breadcrumb-item active">{{ isset($management) ? 'Edit' : 'Add'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($management) ? route('superAdmin.management.update', $management->id) : route('superAdmin.management.store') }}" method="POST">
                    {{ isset($management) ? method_field('PATCH') : ''}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John doe" value="{{ isset($management) ? $management->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="m-b-10">
                                <label class="custom-control custom-radio">
                                    <input value="M" id="radio5" name="gender" type="radio" class="custom-control-input" {{ isset($management) ? $management->gender == 'M' ? 'checked' : '' : old('gender') == 'M' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Male</span>
                                </label>
                                <label class="custom-control custom-radio ">
                                    <input value="F" id="radio6" name="gender"  type="radio" class="custom-control-input" {{ isset($management) ? $management->gender == 'F' ? 'checked' : '' : old('gender') == 'F' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Female</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Johndoe@mailinator.com" value="{{ isset($management) ? $management->email : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="johndoe" value="{{ isset($management) ? $management->username : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" value='' required>
                        </div>
                    </div>
                    <div class="form-actions pull-right">
                        <a class="btn btn-inverse btn-close" href="{{ url()->previous() }}">Cancel</a>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection