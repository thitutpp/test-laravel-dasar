@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
    <h2 class="text-center">List Data Companies</a></h2>
    <a href="{{ route('companies.create') }}" class="btn btn-success mb-2">Add Data Companies</a>
    <a href="{{ route('print.companies') }}" class="btn btn-primary mb-2" href="">Print</a>
    @if(session()->has('status'))
    <div class="alert alert-success">
        {{session()->get('status')}}
        <button class="close" data-dismiss='alert'>X</button>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="laravel_crud">
                <thead class="thead-dark">
                    <tr>
                        <th>Logo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $data)
                        <tr>
                            <td>
                                <img class="rounded-circle" src="{{ url('storage/company/'.$data->logo) }}" width="100px">
                            </td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->website }}</td>
                            <td>{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight"><a class="btn btn-sm btn-info"
                                            href="{{ route('companies.show',$data->id) }}">Show</a></div>
                                    <div class="p-2 bd-highlight"><a class="btn btn-sm btn-warning"
                                            href="{{ route('companies.edit',$data->id) }}">Edit</a></div>
                                    <div class="p-2 bd-highlight">
                                        <form action="{{ route('companies.destroy',$data->id) }}" method="POST">


                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Data Not Found</td></tr>
                    @endforelse
                </tbody>
            </table>
            {!! $companies->links() !!}
        </div>
    </div>
</div>
@endsection