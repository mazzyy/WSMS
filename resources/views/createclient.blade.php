@extends('layouts.app')
@section('left')
<a href="/dashboard" class="btn btn-light"><h3>&#8592;</h3></a>
@endsection
@section("content")
<form name="create" method="GET" action="/mystore" >
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input required name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Abdul">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Number</label>
        <input required name="number" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Address</label>
      <textarea required name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Confirm</button>
  </form>
@endsection
