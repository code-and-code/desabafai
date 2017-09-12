<?php

namespace desabafai\core\Providers;

use desabafai\domains\Like\LikeRepository;
use desabafai\domains\Like\LikeRepositoryEloquent;
use desabafai\domains\Post\PostRepository;
use desabafai\domains\Post\PostRepositoryEloquent;
use desabafai\domains\User\UserRepository;
use desabafai\domains\User\UserRepositoryEloquent;
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
        \App::bind(LikeRepository::class,LikeRepositoryEloquent::class);
        \App::bind(UserRepository::class,UserRepositoryEloquent::class);
    }
}
