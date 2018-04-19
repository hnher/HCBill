<?php

namespace App\Model;

class Project extends Model
{
    protected $table = 'project';

    public function bill()
    {
        return $this->hasOne('App\Model\Bill','project_id','id');
    }
}
