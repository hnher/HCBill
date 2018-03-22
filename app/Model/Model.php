<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Exmodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends Exmodel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $dateFormat = 'U';
}
