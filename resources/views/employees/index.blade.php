@extends('layouts.layouts-dashboard')
@section('content')
<div class="container">
    <h2 class="text-center">List Data Employees</a></h2>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-2">Add Data Employees</a>
    <a href="{{ route('print.employees') }}" class="btn btn-primary mb-2" href="">Print</a>
    @if(session()->has('status'))
    <div class="alert alert-success">
        {{session()->get('status')}}
        <button class="close" data-dismiss='alert'>X</button>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <img class="rounded-circle mr-2" width="50px" height="50px"
                                src="{{ url('storage/company/'.$data->get_company->logo) }}" width="100px">
                            {{ $data->get_company->nama }}
                        </td>
                        <td>{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight">
                                <div class="p-2 bd-highlight"><a class="btn btn-sm btn-info"
                                        href="{{ route('employees.show',$data->id) }}">Show</a></div>
                                <div class="p-2 bd-highlight"><a class="btn btn-sm btn-primary"
                                        href="{{ route('employees.edit',$data->id) }}">Edit</a></div>
                                <div class="p-2 bd-highlight">
                                    <form action="{{ route('employees.destroy',$data->id) }}" method="POST">


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
            {!! $employees->links() !!}
        </div>
    </div>
</div>
@endsection
