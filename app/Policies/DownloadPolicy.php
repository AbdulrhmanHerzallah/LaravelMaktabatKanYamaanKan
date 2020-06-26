<?php

namespace App\Policies;

use App\Models\User;
use App\Models\File;
use Illuminate\Auth\Access\HandlesAuthorization;

class DownloadPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function download(User $user , File $file )
    {
        return $user->id == $file->user_id;
    }
}
