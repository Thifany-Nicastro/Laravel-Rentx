<?php

namespace App\Observers;

use App\Models\Specification;

class SpecificationObserver
{
    /**
     * Handle the Specification "created" event.
     *
     * @param  \App\Models\Specification  $specification
     * @return void
     */
    public function created(Specification $specification)
    {
        //
    }

    /**
     * Handle the Specification "updated" event.
     *
     * @param  \App\Models\Specification  $specification
     * @return void
     */
    public function updated(Specification $specification)
    {
        //
    }

    /**
     * Handle the Specification "deleted" event.
     *
     * @param  \App\Models\Specification  $specification
     * @return void
     */
    public function deleted(Specification $specification)
    {
        //
    }

    /**
     * Handle the Specification "restored" event.
     *
     * @param  \App\Models\Specification  $specification
     * @return void
     */
    public function restored(Specification $specification)
    {
        //
    }

    /**
     * Handle the Specification "force deleted" event.
     *
     * @param  \App\Models\Specification  $specification
     * @return void
     */
    public function forceDeleted(Specification $specification)
    {
        //
    }
}
