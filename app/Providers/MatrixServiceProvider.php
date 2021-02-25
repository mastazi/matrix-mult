<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MatrixService\MatrixServiceInterface;
use App\Services\MatrixService\MatrixService;

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
