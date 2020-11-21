<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">    
    <title>WSMS</title>
    <!-- php -->
    <?php
    use App\Models\User; 
    use App\Models\Date;
    use App\Models\Record;
    $dates=Date::all();
    $user=User::where('id',$id)->get();
    
    ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      body {
  
  background-repeat: no-repeat;
  background-attachment: fixed;
  background: linear-gradient(-135deg,#06beb638 ,#56202045);
  
}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
<body>
                <div class="container">
            <header class="blog-header py-3">
            <div class="float-right ">
                <a class="  p-0 m-0 " href="/"> Logout</a>
            </div>
            </header>

            <div class="nav-scroller py-1 mb-2">
            
            </div>

            <div class="jumbotron p-4 p-md-5 text-white rounded " style="background: linear-gradient(-135deg,#06beb6 ,#4158d0);">
                <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{$user[0]->name}}</h1>
                
                </div>
            </div>

            <div class="row mb-2" >
            @foreach($dates as $date)
            <?php $records=Record::where([['date_id',$date->id],['client_id',$id]])->get();?> 

                <div class="col-md-6">
                
                <div class="row no-gutters  rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                @if(Record::where([['date_id',$date->id],['client_id',$id]])->exists())

            <table class="table bg-light">
            <thead class="thead-dark">
                <tr>
                <th scope="col">{{$date->year}}-{{$date->month}}</th>
                <th scope="col">Bottles</th>
                </tr>
            </thead>
            <tbody>
            

                    @foreach($records as $record)
                            <tr> 
                        <td>{{$record->date}}</td> 
                        <td>{{$record->bottlphpe}}</td>
                        </tr>
                    @endforeach
            </tbody>
            </table>
            @endif
                    
                    
                </div>
                
                </div>
            
            @endforeach
            

                
            </div>
            </div>


</body>
</html>
