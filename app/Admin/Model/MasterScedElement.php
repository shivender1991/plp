<?php

namespace App\admin\model;

use Illuminate\Database\Eloquent\Model;

class MasterScedElement extends Model
{
     protected $fillable = [
        'description', 'definition', 'code'
       ]; 
}
