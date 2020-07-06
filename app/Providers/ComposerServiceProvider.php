<?php

namespace App\Providers;

use App\Http\ViewComposers\BestDiscountComposer;
use App\Http\ViewComposers\BrowsingHistoryComposer;
use App\Http\ViewComposers\OrderStatusesComposer;
use App\Http\ViewComposers\TrandingProductsComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\NavbarComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.navbar', 'basic.home'], NavbarComposer::class);
        view()->composer('layouts.includes.browsinghistory', BrowsingHistoryComposer::class);
        view()->composer('layouts.includes.trandingProducts', TrandingProductsComposer::class);
        view()->composer('layouts.includes.bestDiscount', BestDiscountComposer::class);
        view()->composer('order.order', OrderStatusesComposer::class);
    }
}
