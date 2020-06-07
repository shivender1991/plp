<?php

namespace App\Imports;

use App\Admin\Model\MasterScedElement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use DB;

class MasterScedElementImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $element;
    private $format;
    private $field_type;

    public function setElement(int $element)
    {
        $this->element = $element;
    }
    public function setFormat($format)
    {
        $this->format = $format;
    }
    public function setFieldType($field_type)
    {
        $this->field_type = $field_type;
    }
   
    public function collection(Collection $rows)
    {
       // print_r($rows);die;
        foreach ($rows as $row) 
        {
            $insertdata = new MasterScedElement; 
            $insertdata->field_type                         = trim($this->field_type);
            $insertdata->element_id                         = trim($this->element);
            $insertdata->format                             = trim($this->format);
            $insertdata->description                        = trim($row['description']);
            $insertdata->definition                         = trim($row['definition']);
            $insertdata->code                               = trim($row['code']);
            $insertdata->created_by                         = Auth::user()->id;
            $insertdata->updated_by                         = Auth::user()->id;
            // save data in table
            $insertdata->save();  
        }      
    }
}
