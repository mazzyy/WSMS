<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class welcome extends Controller
{
    //

    public function index(){

        $users=User::all();
        

        return view("welcome")->with("users",$users);
    }

    public function info(Request $request){
        //
        $users=User::all();
        //client data
          $user=$request->input("users");
          $data=clients::where('user_id',$user)->get();
    
        return view("welcome")->with("data",$data)->with("users",$users);
    }
}
