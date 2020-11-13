@extends('layouts.app')
@section("content")
<form method="PUT" action="/dashboard/{{ $client->id }}/update">
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
    <input value="{{$client->name}}" name="name" type="text" class="form-control"  id="exampleFormControlInput1" placeholder="Abdul">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Number</label>
        <input  value="{{$client->number}}"name="number" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Address</label>
      <textarea  name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$client->address}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Confirm</button>
  </form>
@endsection