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
            <a class="nav-link active" href="{{route('main.admin.dashboard')}}">Residential</a>
                <a class="nav-link" href="{{ route('admin.com')}}">Commercial</a>
            </nav>
           <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Property Id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Charge</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($properties as $property)
                  <tr>
                    <th scope="row">{{$property->id}}</th>
                    <td>{{$property->property_id}}</td>
                    <td>{{$property->firstname}}</td>
                    <td>{{$property->surname}}</td>
                    <td>{{$property->place_address}}</td>
                    <td>{{$property->email}}</td>
                    <td>{{$property->phone_number}}</td>
                    <td>{{$property->charge}}</td>
                    <td>{{ $property->payment ? "Paid" : "Not Paid" }}</td>
                </tr>
                    @empty
                        <div class="alert alert-info">No property has been registerd</div>
                    @endforelse
                    
                </tbody>
            </table>  
            <style>
              
            </style>

            
            <nav aria-label="Page navigation">
              <ul class="pagination">
                  {{$properties->links()}}    
              </ul>
            </nav>
        </div>
    </div>
</div>
    




@endsection
