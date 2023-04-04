<?php

namespace App\Observers;

use App\Models\History;
use App\Models\HistoryLog;

class HistoryObserver
{
    /**
     * Handle the History "created" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function created(History $history)
    {
        HistoryLog::create([
            'user' => $history->user->name,
            'item' => $history->items->name,
            'bid' => $history->bid,
            'desc' => 'User berhasil menawar'
        ]);
    }

    /**
     * Handle the History "updated" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function updated(History $history)
    {
        //
    }

    /**
     * Handle the History "deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function deleted(History $history)
    {
        HistoryLog::create([
            'user' => $history->user->name,
            'item' => $history->items->name,
            'bid' => '-',
            'desc' => 'User membatalkan tawaran'
        ]);
    }

    /**
     * Handle the History "restored" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function restored(History $history)
    {
        //
    }

    /**
     * Handle the History "force deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function forceDeleted(History $history)
    {
        //
    }
}