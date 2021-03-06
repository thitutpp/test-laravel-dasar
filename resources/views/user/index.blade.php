@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
    <h2 class="text-center">List Data User</a></h2>
    <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <input type="file" name="file" class="form-control" placeholder="Recipient's username"
                aria-label="Recipient's username" aria-describedby="button-addon2" required>
            <button class="btn btn-primary ml-2" type="submit" id="button-addon2">Import</button>
        </div>
    </form>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->password }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Data Not Found</td></tr>
                    @endforelse
                </tbody>
            </table>
            {!! $user->links() !!}
        </div>
    </div>
</div>
@endsection
