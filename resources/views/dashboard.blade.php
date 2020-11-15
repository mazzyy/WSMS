@extends('layouts.app')

@section('content')
<div class="text-center  row border">
    <a href="/dashboard/create" class="btn btn-info pb-1 font-weight-bold">Create Client</a>
    
<h1 style="padding-left:20%">{{Auth::user()->name}}</h1>
</div>

  <table class="table table-striped ">
<form action="/info/status" method="get">
      <select class="form-control-sm" name="select" id="">
        <option  >Paid</option>
        <option  >NotPaid</option>
      </select>
      <input type="submit" class="btn btn-success pl-1 m-0" value="ok">
    <thead>
      <tr>
        <th>checkbox</th>
        <th>ID</th>
        <th>Name</th>
        <th>Number</th>
        <th>Address</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if (isset($clients))
      
          @foreach ($clients as $item)
        <tr>
          <td><input type="checkbox" name="{{$item->id}}"  ></td>
          <td>{{$item->id}}</td>
          <td><a href="/dashboard/{{$item->id}}/client">{{$item->name}}</a></td>
          <td>{{$item->number}}</td>
          <td>{{$item->address}}</td>
          <td>{{$item->status}}</td>
          <td><a href="/dashboard/{{$item->id}}/edit" class="btn btn-dark">Edit</a></td>
          <td><a href="/dashboard/{{$item->id}}/DELETE" class="btn btn-dark">DELETE</a></td>
        </tr>
        @endforeach
</form>
    @endif
   
    </tbody>
  </table>


  @endsection



