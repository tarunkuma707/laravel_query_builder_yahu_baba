<?php

namespace App\Observers;

use App\Models\Reader;

class ReaderObserver
{
    /**
     * Handle the Reader "created" event.
     */
    public function created(Reader $reader): void
    {
        //
        $reader->posts()->delete();
    }

    /**
     * Handle the Reader "updated" event.
     */
    public function updated(Reader $reader): void
    {
        //
    }

    /**
     * Handle the Reader "deleted" event.
     */
    public function deleted(Reader $reader): void
    {
        //
    }

    /**
     * Handle the Reader "restored" event.
     */
    public function restored(Reader $reader): void
    {
        //
    }

    /**
     * Handle the Reader "force deleted" event.
     */
    public function forceDeleted(Reader $reader): void
    {
        //
    }
}
