<?php

namespace App\Imports;

use App\Admin\Model\MasterStateSced;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Admin\Model\MasterSced;
use App\Admin\Model\MasterStateHeader;

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

        foreach ($rows as $row) 
        {
                  
            $insertdata = new MasterStateSced; 
            $stateTableHeaders = MasterStateHeader::all('name');

            foreach($stateTableHeaders as  $stateTableHeader){ 
            $columname=$stateTableHeader->name;
              $insertdata->$columname = $row[''.$columname.''];
           
            }

            $insertdata->format                            = trim($this->format);
            $insertdata->state_field                       = json_encode($row);
            $insertdata->created_by                        = Auth::user()->id;
            $insertdata->updated_by                        = Auth::user()->id;       
            $insertdata->save();        
        }      
    }
}
