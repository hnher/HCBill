<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     *
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

}
