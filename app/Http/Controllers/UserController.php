<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

# TODO: Add CRUD For all models

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return View
     */
    public function index()
    {
        $users = User::withTrashed()->paginate(15);

        # TODO: Add paginate feature
        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);
        $user->deleted_at = null;
        $user->save();

        return back();
    }

    /**
     * Ban the specified user from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return back();
    }

    /**
     * Permanently delete the specified user from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();

        return back();
    }
}
