<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $dateFormat = 'U';

    protected $table = 'users';

}
