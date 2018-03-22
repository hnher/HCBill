<?php

namespace App\Model;

class Debit extends Model
{
    protected $table = 'debit';

    public function project()
    {
        return $this->hasOne('App\Model\Project', 'id', 'project_id');
    }

    public function handle()
    {
        return $this->hasOne('App\Model\Handle', 'id', 'handle_id');
    }
}
