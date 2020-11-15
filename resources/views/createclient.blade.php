@extends('layouts.app')
@section('left')
<a href="/dashboard" class="btn btn-light"><h3>&#8592;</h3></a>
@endsection
@section("content")
<form name="create" method="GET" action="/mystore" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Abdul">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Number</label>
        <input name="number" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Address</label>
      <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Confirm</button>
  </form>
@endsection

<script>
  function validateForm() {
  var x = document.forms["create"]["name"].value;
  var y = document.forms["create"]["number"].value;
  var z = document.forms["create"]["address"].value;

  if (x == "" || y=="" || z=="") {
    alert("form must be filled out");
    return false;
}
}
  </script>