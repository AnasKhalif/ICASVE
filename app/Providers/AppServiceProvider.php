<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Logo;
use App\Models\Upload;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.landingpartials.header', function ($view) {
            $logo = Logo::orderBy('year', 'desc')->first();
            $view->with('logo', $logo);
        });

        View::composer('*', function ($view) {
            $logo = Upload::where('type', 'logo')->latest()->first();
            $logoPath = $logo ? asset('storage/' . $logo->file_path) : asset('img/icasve_logo.jpg');

            $view->with('logoPath', $logoPath);
        });
    }
}
