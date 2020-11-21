@extends('layouts.app')

@section('navbar')
    <a href="/" class="btn btn-light"><h5>Logout</h5></a>

@endsection


@section('left')

<div class="bg-light">
@if( Auth::user())
<a href="/dashboard" class="btn btn-light"><h3>&#8592;</h3></a>

<form name="record" method="GET" required action="/dashboard/{{$id}}/client/record"  style="padding-top: 21%" class="border-right pr-2">
  <h1>RECORDS</h1>
  <div class="form-group">
    <label for="exampleFormControlInput1">Bottles</label>
    <input required name="bottle" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Abdul">
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Day</label>
      <input required name="day" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Number">
  </div>
 
<input type="hidden" name="client_id" id="" value="{{$id}}">
<input type="hidden" name="date_id" id="" value="{{$currentdate}}">
  <button type="submit" class="btn btn-primary mb-2">Confirm</button>
</form>
@endif

</div>
@endsection

@section('content')
<header  class="p-2 mb-2 bg-dark text-white">
{{-- logout --}}
@php
    use App\Models\clients;
    $password=clients::where('id',$id)->get('password');
    
@endphp
 
{{--  --}}


  
  {{-- date select --}}
  
    <form name="date"  action="/dashboard/{{$id}}/date" >
        <label for="bdaymonth">Data record (month and year):</label>
        <input required name="bdaymonth1" type="month" id="bdaymonth">
    <input type="hidden" id="bdaymonth" name="id" value="{{$id}}">
        <input type="submit">
      
        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
         password
        </button>
        
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
  <td>
  @if (Auth::user())
<form action="/dashboard/{{$item->id}}/delete" method="GET">
<input type="hidden" value="{{$currentdate}}" name="record">
  <input type="submit" class="btn btn-dark" value="DELETE">
</form>
@endif
  </td>
      {{-- <td><a href="/dashboard/{{$item->id}}/delete" type="submit" name="delete" class="btn btn-dark">DELETE</a></td> --}}
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



<!-- Modal -->
<div class="modal fade  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {{$password[0]->password}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection


