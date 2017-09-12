<?php

namespace desabafai\core\Providers;

use desabafai\domains\Post\PostRepository;
use desabafai\domains\Post\PostRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale($this->app->getLocale());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind(PostRepository::class,PostRepositoryEloquent::class);
    }
}
