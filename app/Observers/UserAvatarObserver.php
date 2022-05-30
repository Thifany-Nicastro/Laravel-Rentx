<?php

namespace App\Observers;

use App\Models\UserAvatar;
use Ramsey\Uuid\Uuid;

class UserAvatarObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function creating(UserAvatar $userAvatar)
    {
        $userAvatar->id = Uuid::uuid4();
    }

    /**
     * Handle the UserAvatar "created" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function created(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Handle the UserAvatar "updated" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function updated(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Handle the UserAvatar "deleted" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function deleted(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Handle the UserAvatar "restored" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function restored(UserAvatar $userAvatar)
    {
        //
    }

    /**
     * Handle the UserAvatar "force deleted" event.
     *
     * @param  \App\Models\UserAvatar  $userAvatar
     * @return void
     */
    public function forceDeleted(UserAvatar $userAvatar)
    {
        //
    }
}
