<?php

namespace App\admin\model;

use Illuminate\Database\Eloquent\Model;

class MasterStateMetadataValue extends Model
{
     protected $fillable = [
        'header_id', 'metadata_values'
       ]; 
}
