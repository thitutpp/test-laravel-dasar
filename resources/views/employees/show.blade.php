@extends('layouts.layouts-dashboard')
@section('content')

<div class="container mb-4">
    <h2 class="text-center">Detail Data Employees</a></h2>
</div>
<div class="container d-flex justify-content-center">

<div class="card" style="width: 18rem;">
    <img src="{{ url('storage/company/'.$employees->get_company->logo) }}" width="1000px" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$employees->nama}}</h5>
      <ul class="list-unstyled">
          <li>Email : {{$employees->email}}</li>
          <li>Company : {{$employees->get_company->nama}}</li>
          
      </ul>
    </div>
  </div> 

</div>
<div class="container">
    <div class="d-flex justify-content-center ">
        <a href="{{route("employees.index")}}" class="btn btn-warning mt-4"> Kembali</a>
    </div>
</div>
    
@endsection