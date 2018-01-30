<?php

namespace App\Policies;

use App\User;
use App\Research;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResearchPolicy
{
    use HandlesAuthorization;

    public function owner(User $user, Research $research)
    {
      return $user->id === $research->author_id;
    }
}
