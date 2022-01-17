<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Observers\CommentObserver;
use App\Observers\OrderObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comment::observe(CommentObserver::class);
        Order::observe(OrderObserver::class);

        Blade::directive('price', function ($product) {
            return "<?php echo number_format($product) . \"&nbsp; تومان\"; ?>";
        });

        Blade::directive('cartTotalPrice', function ($array) {
            $cart_products = $array[0];
            $cart_items_counts = $array[1];
            return "<?php echo cartTotalPrice($cart_products, $cart_items_counts) . \"&nbsp; تومان\"; ?>";
        });

        Blade::directive('productTotalPrice', function ($product) {
            return "<?php echo $product->totalprice . \"&nbsp; تومان\"; ?>";
        });

        #TODO: How to retrieve cookie in app service provider
        Paginator::useBootstrap();

        if(Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share('categories', $categories);
        }
    }
}
