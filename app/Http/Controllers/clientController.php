<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Date;
 

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $current=Auth::id();
        // dd($current);

        $clients=clients::where('user_id', $current)->get();
        // dd($clients);
        
        
      
        return view("dashboard")->with("clients", $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("createclient");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'name' => 'required|max:255'
          ));
  
          $category = new Category;
          $category->name = $request->name;
          $category->save();
  
          Session::flash('success', 'Category has been created!');
  
          return redirect()->route('categories.index');

        return view("dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client=clients::find($id);
        // $client->name=;
        // $client->save();
        // $cleint->name="badami";
        // $cleint->number="badami";
        // $cleint->address="badami";
        // $client->save();
        return view("Editclient")->with("client",$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return view("Editclient");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        return "yoo";
    }


    public function mystore(Request $request){
      

       $client =new clients();
       $userId = Auth::id();
       $client->user_id=$userId;
       $client->password=Str::random(8);
       $client->name=$request->input('name');
       $client->number=$request->input('number');
       $client->address=$request->input('address');       
       $client->save();
       $clients=clients::all();

       return redirect("dashboard")->with("clients", $clients);
    }

    public function delete($id){

          $client=clients::find($id);
        $client->delete();

        return redirect("dashboard");
    }
    public function update1($id, Request $request){
        $client=clients::find($id);
       $client->name=$request->input('name');
       $client->number=$request->input('number');
       $client->address=$request->input('address');       
       $client->save();
        
     return redirect("dashboard");        
    }

    public function status(Request $request){
            $yoo=$request->input();
                  $select=$request->input("select");
                //   $yoo=explode(':', $yoo);
                $checkbox=array();
                $i=0;
                foreach ($yoo as $key => $array)
                {
                     $client_checkbox=clients::find($key);
                     if(isset($client_checkbox))
                     {
                     $client_checkbox->status=$select;
                     $client_checkbox->save();
                     $checkbox[$i]=$key;
                     }
                     $i++;
                }
                

                 
        return redirect()->back();
    }

public function loginclient(){

  


 return view("clientlogin");
}

public function clientloginauth(Request $request){

    $number=$request->input("number");  
    $password=$request->input("password");  

  if(clients::where([['password', $password],['number', $number]] )->exists())
    {
        $client=clients::where([['password', $password],['number', $number]])->get();
        $id=$client[0]->id;   
        // dd($client[0]->id);

        //current date
        $date = Carbon::now();
        $date=array($date->year,$date->month);
        $dateid=Date::where([['year', $date[0]],['month', $date[1]]])->get();
       
        //record
        $client_record=record::where([['client_id',$id],['date_id',$dateid[0]->id]])->get();
        $sum=record::where([['client_id',$id],['date_id',$dateid[0]->id]])->sum("bottlphpe");

  
      return view("records")->with('id',$id)->with('date',$date)->with('client_record',$client_record)->with("currentdate",$dateid[0]->id)->with("sum",$sum);
    }
       
 
  
    return redirect()->back();
   }



}
