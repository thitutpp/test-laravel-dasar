@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
<h2 class="text-center">Edit Data Companies</a></h2>
<br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('employees.update',$employees->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf

    @method('PUT') 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Enter Nama Baru"
                    value="{{ $employees->nama }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" placeholder="Masukan Email Baru"
                    value="{{ $employees->email }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Companies</strong>
                <select class="form-control select2" name="company" id="company">
                    @foreach($companies as $id => $get_company)
                    <option value="{{ $id }}" {{ (old('company') ? old('company') : $employees->get_company->id ?? '') == $id ? 'selected' : '' }}>{{ $get_company ?? ''  }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('employees.index') }}" class="btn btn-warning">Kembali</a>

        </div>
    </div>
</form>
</div>
@endsection