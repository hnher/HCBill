<?php

namespace App\Model;

class Project extends Model
{
    protected $table = 'project';

    public function debit()
    {
        return $this->hasOne('App\Model\Debit','project_id','id');
    }
}
