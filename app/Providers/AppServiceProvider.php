<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

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
        Blade::directive('price', function ($expression) {
            return "<?php echo number_format($expression) . \"&nbsp; تومان\"; ?>";
        });

        Blade::directive('totalPrice', function ($expression) {
            return "<?php echo totalPrice($expression) . \"&nbsp; تومان\"; ?>";
        });

        \Illuminate\Pagination\Paginator::useBootstrap();

        $categories = Category::all();
        View::share('categories', $categories);
    }
}
