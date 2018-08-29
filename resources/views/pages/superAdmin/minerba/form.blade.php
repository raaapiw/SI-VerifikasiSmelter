@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Minerba</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Minerba</a></li>
            <li class="breadcrumb-item active">{{ isset($minerba) ? 'Edit' : 'Add'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($minerba) ? route('superAdmin.minerba.update', $minerba->id) : route('superAdmin.minerba.store') }}" method="POST">
                    {{ isset($minerba) ? method_field('PATCH') : ''}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John doe" value="{{ isset($minerba) ? $minerba->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Johndoe@mailinator.com" value="{{ isset($minerba) ? $minerba->email : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="johndoe" value="{{ isset($minerba) ? $minerba->username : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
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