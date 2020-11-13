<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;
use App\Models\date;

class Record extends Model
{
    use HasFactory;
    
   public function clients(){

    return $this->belongsTo("App/clients");
   }

   public function date(){

    return $this->belongsTo("App/date");
}
}
