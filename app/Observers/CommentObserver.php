<?php

namespace App\Observers;

use App\Mail\CommentStatusChanged;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($comment->user->email)
            ->later(now()->addSeconds(5), new CommentStatusChanged($comment));
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

        Mail::to($comment->user->email)
            ->later(now()->addSeconds(5), new CommentStatusChanged($comment));
    }
}
