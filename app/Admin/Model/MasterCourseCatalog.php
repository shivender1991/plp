<?php

namespace App\admin\model;

use Illuminate\Database\Eloquent\Model;

class MasterCourseCatalog extends Model
{
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}