@extends('layouts.app')
@section('left')
<div class="bg-light">
<a href="/dashboard" class="btn btn-light"><h3>&#8592;</h3></a>
<form method="GET" action="/dashboard/{{$id}}/client/record"  style="padding-top: 21%" class="border-right pr-2">
  <h1>RECORDS</h1>
  <div class="form-group">
    <label for="exampleFormControlInput1">Bottles</label>
    <input name="bottle" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Abdul">
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Day</label>
      <input name="day" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
  </div>
 
<input type="hidden" name="client_id" id="" value="{{$id}}">
<input type="hidden" name="date_id" id="" value="{{$currentdate}}">
  <button type="submit" class="btn btn-primary mb-2">Confirm</button>
</form>

</div>
@endsection

@section('content')
<header  class="p-2 mb-2 bg-dark text-white">
  {{-- date select --}}
    <form action="/dashboard/{{$id}}/date">
        <label for="bdaymonth">Data record (month and year):</label>
        <input  name="bdaymonth1" type="month" id="bdaymonth">
    <input type="hidden" id="bdaymonth" name="id" value="{{$id}}">
        <input type="submit">
    </form> 
</header>
{{-- table for records --}}
<header> 
<span class="h1 text-center">{{$date[0]}}-{{$date[1]}}</span>
</header>
<table class="table table-striped">
    
  <thead>
    <tr>
      {{-- <th>checkbox</th> --}}
      
      <th>number of bottles</th>
      <th>Date</th>
      
      
    </tr>
  </thead>
  <tbody>
    
    @if(isset($client_record))
        
      @foreach ($client_record as $item)
    <tr>
      <td>{{$item->bottlphpe}}</td>
      <td>{{$item->date}}</td>
     
      <td>{{$item->number}}</td>
      <td>{{$item->address}}</td>
      <td><a href="/dashboard/{{$item->id}}/delete" class="btn btn-dark">DELETE</a></td>
    </tr>
    @endforeach
    @endif
    @if(isset($sum))
      <tr>
          <td> <h4>Tottal bottles={{$sum}}</h4></td>
      </tr>
    @endif
  </tbody>
</table>
@endsection