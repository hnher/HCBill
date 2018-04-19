<?php

namespace App\Listeners;

use App\Events\LoginTimeShipped;
use App\Events\LogsShipped;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LoginTimeListener
{

    /**
     * 此事件是监听最后登陆时间
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  LoginTimeShipped  $event
     * @return void
     */
    public function handle(LoginTimeShipped $event)
    {
        $event->user->last_time = time();

        $event->user->ip = $event->request->ip();

        $event->user->save();
    }
}
