<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

# TODO: Add CRUD For all models

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

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
     * @param int $id
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
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function updateFavorites(Request $request, $id)
    {
        $user = Auth::user();
        $json = json_decode($user->favorite_products) ?: array();

        $key = array_search($id, $json);

        if ($key !== false) {
            unset($json[$key]);

            if (empty($json))
                $user->favorite_products = null;
            else
                $user->favorite_products = json_encode($json);

            $user->save();
            return 0;
        } else {
            $json[] = $id;

            $user->favorite_products = json_encode($json);
            $user->save();

            return 1;
        }

    }

    /**
     * Ban the specified user from storage.
     *
     * @param int $id
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
     * @param int $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();

        return back();
    }
}
