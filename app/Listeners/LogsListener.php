<?php

namespace App\Listeners;

use App\Events\LogsShipped;
use App\Model\Logs;
use App\Model\Status;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogsListener
{
    public $logs;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Logs $logs)
    {
        $this->logs = $logs;
    }

    /**
     * Handle the event.
     *
     * @param  LogsShipped  $event
     * @return void
     */
    public function handle(LogsShipped $event)
    {
        $this->logs->users_id = Auth::user()->id;

        $this->logs->status_id = $event->status_id;

        $this->logs->operating_id = $event->operating_id;

        $this->logs->last_time = time();

        $this->logs->save();
    }
}
