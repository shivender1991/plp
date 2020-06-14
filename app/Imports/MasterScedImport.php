<?php

namespace App\Imports;

use App\Admin\Model\MasterSced;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use DB;

class MasterScedImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    private $format;
    public function setFormat($format)
    {
        $this->format = $format;
    }
   
    public function collection(Collection $rows)
    {

       // echo count($rows);die;
        foreach ($rows as $row) 
        {     
            $insertdata = new MasterSced; 
            $insertdata->format                          = trim($this->format);
            $insertdata->SCED_course_code                = trim($row['sced_course_code']);
            $insertdata->SCED_course_title               = trim($row['course_title']);
            $insertdata->SCED_course_description         = trim($row['course_description']);
            $insertdata->change_status                   = trim($row['change_status']);
            $insertdata->created_by                      = Auth::user()->id;
            $insertdata->updated_by                      = Auth::user()->id;
            // save data in table
            $insertdata->save();  
        }   
    }
}
