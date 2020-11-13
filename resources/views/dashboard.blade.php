@extends('layouts.app')

@section('content')
<div class="text-center  row border">
    <a href="/dashboard/create" class="btn btn-info pb-1 font-weight-bold">Create Client</a>
    
    <h1 style="padding-left:20%">WATERSUPPLY</h1>
</div>
<table class="table table-striped ">
    
    <thead>
      <tr>
        {{-- <th>checkbox</th> --}}
        <th>ID</th>
        <th>Name</th>
        <th>Number</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $item)
      
      <tr>
        <td>{{$item->id}}</td>
        <td><a href="/dashboard/{{$item->id}}/client">{{$item->name}}</a></td>
        <td>{{$item->number}}</td>
        <td>{{$item->address}}</td>
        <td><a href="/dashboard/{{$item->id}}/edit" class="btn btn-dark">Edit</a></td>
        <td><a href="/dashboard/{{$item->id}}/DELETE" class="btn btn-dark">DELETE</a></td>
        
      </tr>

      @endforeach
   
    </tbody>
  </table>

@endsection
