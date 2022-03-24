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
<form action="{{ route('companies.update',$companies->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Enter Nama Baru"
                    value="{{ $companies->nama }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" placeholder="Masukan Email Baru"
                    value="{{ $companies->email }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Website</strong>
                <input type="website" name="website" class="form-control" placeholder="Masukan Website Baru"
                    value="{{ $companies->website }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Logo :</strong>
                <input type="file" name="logo" class="form-control" placeholder="logo">
                <img src="{{ url('storage/company/'.$companies->logo) }}" width="100px">
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('companies.index') }}" class="btn btn-warning">Kembali</a>

        </div>
    </div>
</form>
</div>
@endsection