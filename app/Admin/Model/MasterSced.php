<?php

namespace App\admin\Model;

use Illuminate\Database\Eloquent\Model;

class MasterSced extends Model
{
     protected $fillable = [
        'SCED_course_code', 'SCED_course_title', 'SCED_course_description','change_status'
       ]; 



    public function getTableColumns() {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
