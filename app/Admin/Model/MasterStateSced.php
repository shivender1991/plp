<?php

namespace App\admin\model;

use Illuminate\Database\Eloquent\Model;

class MasterStateSced extends Model
{
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}