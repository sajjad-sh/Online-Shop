<?php

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


# TODO: Refactor route Structures and names

/*
 *
 * which packages ?
 * intervention
 * spotty media library
 * verta
 * switty alert
 * rich text editor
 * shetabi payment
 */

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';


Route::get('addWatermark', function()
{

    dd(Storage::url(storage_path("app/public/products/prd-71/abbas.jpg")));

    /* insert watermark at bottom-right corner with 10px offset */
    $img->insert(public_path('img/logo/logo.png'), 'bottom-right', 10, 10);

    $img->save(public_path('img/logo/main-new.jpg'));

    dd('saved image successfully.');
});
