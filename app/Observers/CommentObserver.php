<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    /**
     * Handle the Comment "verified" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function verified(Comment $comment)
    {
        info("comment verified");
    }

    /**
     * Handle the Comment "verified" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function unverified(Comment $comment)
    {
        info("comment unverified");
    }
}
