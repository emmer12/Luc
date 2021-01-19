@extends('layouts.app')

@section('content')

<style>
    .nav{
        background:#ddd 
    }
    .nav .nav-link{
        border: 2px solid #fff
    }
    .nav .nav-link.active{
        background: green;
        color:#fff
    }
</style>

<div class="container">
       <div class="row ">
            <nav class="nav">
                <a class="nav-link" href="{{route('main.admin.dashboard')}}">Residential</a>
                <a class="nav-link active" href="{{ route('admin.com')}}">Commercial</a>
            </nav>
           <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Property Id</th>
                    <th scope="col">Property Address</th>
                    <th scope="col">Organization Name name</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Landuse</th>
                    <th scope="col">Charge</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($properties as $property)
                  <tr>
                    <th scope="row">{{$property->id}}</th>
                    <td>{{$property->property_id}}</td>
                    <td>{{$property->property_address}}</td>
                    <td>{{$property->org_name}}</td>
                    <td>{{$property->registration_no}}</td>
                    <td>{{$property->contact_number}}</td>
                    <td>{{$property->email}}</td>
                    <td>{{$property->use}}</td>
                    <td>{{$property->charge()->charge}}</td>
                    <td>{{ $property->payment ? "Paid" : "Not Paid" }}</td>
                </tr>
                    @empty
                        <div class="alert alert-info">No property has been registerd</div>
                    @endforelse
                    
                </tbody>
            </table>  
        </div>
    </div>
</div>
    




@endsection
