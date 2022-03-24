@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
    <h2 class="text-center">List Data User</a></h2>
<br>
<form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <input type="file" name="file" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" required>
        <button class="btn btn-primary ml-2" type="submit" id="button-addon2">Import</button>
    </div>
</form>

{{-- <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
    @csrf            
<button type="sumbit" class="btn btn-primary"  />DownloadFile</button>
</form> --}}
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->password }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $user->links() !!}
        </div>
    </div>
</div>
@endsection