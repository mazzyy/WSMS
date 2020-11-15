<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
}
