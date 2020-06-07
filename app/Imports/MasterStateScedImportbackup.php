<?php

namespace App\Imports;

use App\Admin\Model\MasterStateSced;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Admin\Model\MasterSced;

class MasterStateScedImport implements ToCollection, WithHeadingRow
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

  echo "<pre>";
       print_r($rows);die;
        foreach ($rows as $row) 
        {
          $SCEDCoureCode=SUBSTR($row['sced_course_code'], -2, 2)."".trim($row['course_code']);
          $masterSCEDData = DB::table('master_sceds')->select('SCED_course_code','SCED_course_title','SCED_course_description')->where('SCED_course_code', $SCEDCoureCode)->first();

           // $users = DB::table('users')->select('name', 'email')->get();
           //echo '<pre>'; print_r($masterSCEDData); echo '</pre>'; 
      

            $insertdata = new MasterStateSced; 
            $insertdata->format                            = trim($this->format);

           // $insertdata->subject_area_code                 = trim($row['subject_area_code']);
            ///$insertdata->subject_area                      = trim($row['subject_area']);
           // $insertdata->course_code                       = trim($row['course_code']);
           //$insertdata->course_title                      = trim($row['course_title']);
          //  $insertdata->course_description                = trim($row['description']);
            $insertdata->state_field                       = json_encode($row);
            //$insertdata->SCED_code                         = trim($SCEDCoureCode);

            //$insertdata->SCED_subject_area_code            = SUBSTR($row['sced_course_code'], -2, 2);

           // $insertdata->SCED_course_code                  = trim($row['course_code']);
            //$insertdata->SCED_subject_area                 = trim($row['subject_area']);
            //$insertdata->SCED_code                         =
           // $insertdata->SCED_course_title                 = 
            //$insertdata->SCED_course_description           = 
            $insertdata->created_by                        = Auth::user()->id;
            $insertdata->updated_by                        = Auth::user()->id;

            // save data in table
            $insertdata->save();  
            // echo "<pre>";
           // print_r($masterSCEDData);
           // die;
        }      
    }
}
