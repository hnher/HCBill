<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{

    protected $dateFormat = 'U';

    protected $table = 'users';

}
