<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MatrixMult\MatrixServiceInterface;
use App\Services\MatrixMult\MatrixService;

class MatrixServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MatrixServiceInterface::class, MatrixService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
