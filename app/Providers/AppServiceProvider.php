<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import View facade
use App\Models\Masjid; // Import Masjid model (pastikan model ini ada)

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $masjid = null;

        if (Schema::hasTable('masjids')) {
            $masjid = Masjid::first();
        }

        View::share('masjid', $masjid);

        \Carbon\Carbon::setLocale('id');
    }
}
