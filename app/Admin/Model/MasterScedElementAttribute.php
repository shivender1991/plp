<?php

namespace App\admin\model;

use Illuminate\Database\Eloquent\Model;

class MasterScedElementAttribute extends Model
{
     protected $fillable = [
        'description', 'definition', 'code'
       ]; 
}
