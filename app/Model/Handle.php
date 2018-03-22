<?php

namespace App\Model;

class Handle extends Model
{
    protected $table = 'handle';

    public function debit()
    {
        return $this->hasOne('App\Model\Debit','handle_id','id');
    }

}
