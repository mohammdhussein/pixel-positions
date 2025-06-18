<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Job $job): bool
    {
        return true;
    }

    public function edit(User $user, Job $job): bool
    {
        return $user->employer == $job->employer;
    }
}
