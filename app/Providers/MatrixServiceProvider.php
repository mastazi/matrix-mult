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
        $request = $this->app->request;
        $validated = $request->validate([
            'matrix_a' => 'required|array',
            'matrix_b' => 'required|array',
        ]);
        $this->app->bind(MatrixServiceInterface::class, new MatrixService($request->matrix_a, $request->matrix_b));
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
