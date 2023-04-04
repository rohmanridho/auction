<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserLog;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level ? 'public' : 'public',
            'desc' => 'User baru berhasil ditambahkan'
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'desc' => 'User berhasil diupdate'
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'desc' => 'User berhasil didelete'
        ]);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}