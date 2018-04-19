<?php

namespace App\Model;

class Handle extends Model
{
    protected $table = 'handle';

    public function bill()
    {
        return $this->hasOne('App\Model\Bill','handle_id','id');
    }

}
