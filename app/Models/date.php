<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record;



class date extends Model
{

    public function record(){

        return $this->hasMany("App/record");
    }
    
    use HasFactory;
}
