<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        return $topic->user_id == $user->id;
    }

    public function destroy(User $user, Topic $topic)
    {
        return true;
    }
}
