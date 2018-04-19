<?php

namespace App\Model;

class Logs extends Model
{
    protected $table = 'logs';

    public function user()
    {
        return $this->hasOne('App\Model\Users', 'id', 'users_id');
    }

    public function status()
    {
        return $this->hasOne('App\Model\Status', 'id', 'operating_id');
    }
}
