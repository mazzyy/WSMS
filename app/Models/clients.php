<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\record;
use App\Models\date;

class clients extends Model
{
    use HasFactory;

//Many records    
   public function record(){

    return $this->hasMany("App/Record");
   }
//Many dates
   public function date(){

    return $this->hasMany("App/Models/date");
   }
//belongsTo client
   public function client(){

    return $this->belongsTo("App\Models\User");
}

   

}
