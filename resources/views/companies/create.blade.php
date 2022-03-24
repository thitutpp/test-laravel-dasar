@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
    <h2 class="text-center">Add Data Companies</a></h2>
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
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nama</strong>
                    <input type="text" name="nama" value="{{old('nama')}}" class="form-control" placeholder="Masukan Nama Anda">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email Anda">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Website</strong>
                    <input type="text" name="website" value="{{old('website')}}" class="form-control" placeholder="Masukan Website Anda">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Logo</strong>
                    <input type="file" name="logo" class="form-control" placeholder="Pilih Logo">
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
