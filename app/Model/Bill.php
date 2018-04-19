<?php

namespace App\Model;

class Bill extends Model
{
    protected $table = 'bill';

    public function project()
    {
        return $this->hasOne('App\Model\Project', 'id', 'project_id');
    }

    public function handle()
    {
        return $this->hasOne('App\Model\Handle', 'id', 'handle_id');
    }

    public function user()
    {
        return $this->hasOne('App\Model\Users', 'id', 'user_id');
    }
}
