<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDoc extends Model
{
    public function parameters(){

    	return $this->belongsToMany(Parameter::class);
    }
}
