<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        $users = User::withTrashed()->paginate(15);

        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);
        $user->deleted_at = null;
        $user->save();

        return response()
            ->json([
                'message' => 'User Updated Successfully'
            ], 200);
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
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

            return response()
                ->json([
                    'message' => 'Product removed from favorites successfully',
                    'data' => $user->favorite_products
                ]);
        } else {
            $json[] = $id;

            $user->favorite_products = json_encode($json);
            $user->save();

            return response()
                ->json([
                    'message' => 'Product added to favorites successfully',
                    'data' => $user->favorite_products
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()
            ->json([
                'message' => 'User Soft Deleted Successfully'
            ], 200);
    }

    /**
     * Permanently delete the specified user from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();

        return response()
            ->json([
                'message' => 'User Force Deleted Successfully'
            ], 200);
    }
}
