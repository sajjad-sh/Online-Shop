<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Comment::paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Verify the comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request, Comment $comment)
    {
        $comment->is_verify = 1;
        $comment->cancel_reason = '';
        $comment->save();

        return response()
            ->json([
                'message' => 'Comment verify successfully.',
                'data' => $comment,
            ]);
    }

    /**
     * Unverify the comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function unverify(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'cancel_reason' => 'required|min:10|max:255',
        ]);

        $comment->is_verify = 2;
        $comment->cancel_reason = $validated['cancel_reason'];
        $comment->save();

        return response()
            ->json([
                'message' => 'Comment unverified successfully.',
                'data' => $comment,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $comment->delete();

        return response()
            ->json([
                'message' => 'Comment deleted successfully.',
                'data' => $comment,
            ]);
    }
}
