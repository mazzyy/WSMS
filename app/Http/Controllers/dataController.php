<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Date;
use App\Models\clients;
use Carbon\Carbon;
use DateTime;





class dataController extends Controller
{
    //
    public function index($id){
//show last saved date record
        $date2=date::oldest()->first();

        $currentdate=$date2->id;
        $date2=array($date2->year,$date2->month);
        $client_record=record::where([['client_id',$id],['date_id',$currentdate]])->get();
        $sum=record::where([['client_id',$id],['date_id',$currentdate]])->sum("bottlphpe");
        // $carbon=Carbon::tomorrow()->format('l Y m d');
        return view("records")->with("date",$date2)->with("id",$id)->with("currentdate",$currentdate)->with('client_record',$client_record)->with("sum",$sum);
    }


    public function date($id,Request $request){
        
        $date2=$request->input("bdaymonth1");
        $date2=explode("-",$date2);
        


        if(date::where([['month', $date2[1]],['year', $date2[0]]] )->exists()){
            // your code...
            $currentdate=date::where([['month', $date2[1]],['year', $date2[0]]] )->get();
            $currentdate=$currentdate[0]->id;
         
            $client_record=record::where([['client_id',$id],['date_id',$currentdate]])->get();
            $sum=record::where([['client_id',$id],['date_id',$currentdate]])->sum("bottlphpe");
        

           return view("records")->with("date",$date2)->with("id",$id)->with("currentdate",$currentdate)->with('client_record',$client_record)->with("sum",$sum);
           }
        else{
            $date =new date();
            $date->year=$date2[0];
            $date->month=$date2[1];
            $date->client_id=$id;  
            $date->save();
            $currentdate=$date->id;
           
            // $date2=array($date2->year,$date2->month);
            return view("records")->with("date",$date)->with("id",$id)->with("currentdate",$currentdate);
        }
                              
        // dd($date);
                  
   
    return view("records")->with("date",$date2)->with("id",$id)->with("currentdate",$currentdate);
    }

    public function record($id,Request $request ){
          $record =new record();
          $record->bottlphpe=$request->input("bottle");
          //convert date into day
        //    $timestamp = strtotime($record->date);
        // //    $day = date('D', $timestamp);
        // //     $converteddate=explode("-",$request->input("day"));
        // //     $converteddate=$converteddate[2].$day;
        //      dd($timestamp);
 


          $record->date=$request->input("day");
          $record->client_id=$request->input("client_id");
          $record->date_id=$request->input("date_id");
          $record->save();
         $date2=date::find($record->date_id);
         $date2=array($date2->year,$date2->month);
    
       
        
          $client_record=record::where([['client_id',$id],['date_id',  $record->date_id]])->get();
          $sum=record::where([['client_id',$id],['date_id',$record->date_id]])->sum("bottlphpe");
        
           
        return view("records")->with("date",$date2)->with("id",$id)->with("currentdate",$record->date_id)->with('client_record',$client_record)->with('sum', $sum);
    }

    public function delete($id,Request $request){

        $record=record::find($id);
        $client=$record->client_id;
        $record->delete();

        //date
        $currentdate=$request->input();
        $currentdate=Date::find( $currentdate);
        $currentdate[0]["year"]+$currentdate[0]["month"];
        $date=$currentdate[0]["year"]."-".$currentdate[0]["month"];
        return redirect("dashboard/$client/date?bdaymonth1=$date"); 
    }



}
