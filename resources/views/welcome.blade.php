<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    <title>Document</title>
</head>
<style>
body {
  
  background-repeat: no-repeat;
  background-attachment: fixed;
  background: linear-gradient(-135deg,#06beb638 ,#56202045);
  
}
</style>
<body class="">
    <div class="container-fluid p-0 m-0">
        <nav  style="background: linear-gradient(-135deg,#06beb6 ,#4158d0);" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'HOME') }} --}}
                
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                
                                <div class="dropdown" style="padding-top:11%;">
                                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Login
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('login') }}">{{ __('Company') }}</a>
                                           <a class="dropdown-item" href="login/client">{{ __('client') }}</a>
                                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                                        </div>
                                    </div>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <h1><a class="pl-5" href="{{ url('/dashboard') }}" class="h1  text-gray-700 underline">Dashboard</a></h1>
                   
                    @endif
                </div>
                @endif
            </div>
            <div class="col-md-4">
        </div>
        </header>

     <div class="row ">
        <div class="col-md-2 " ></div>
        <div class="col-md-8 bg-light" >
           <table class="table table-striped ">
    {{-- dropdown --}}
    
      <div class="row">
        <form action="/info" method="get">
            
            <div class="col-md-10">
                <select class="form-control select2bs4 p-1" name="users">
                    @foreach ($users as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach    
                </select>
            </div>
            <div class="col-md-2"> <input class="btn btn-info" type="submit" value="search"></div>
        </form>
      </div>
                <thead>
                    
                    <tr>
                        {{-- <th>checkbox</th> --}}
                        <th>ID</th>
                        <th>Clients</th>
                        <th>Number</th>
                        <th>Address</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @if (isset($data))                    
                        @foreach ($data as $item)    
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->number}}</td>
                                <td>{{$item->address}}</td>
                            </tr>                
                          @endforeach
                    @endif
                 </tbody>
            </table>
        </div>
      <div class="col-md-2" ></div>
     </div>
     </div>
            
    
</body>
</html>