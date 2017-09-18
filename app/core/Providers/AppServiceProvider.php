<?php

namespace desabafai\core\Providers;

use desabafai\domains\Comment\Comment;
use desabafai\domains\Like\LikeRepository;
use desabafai\domains\Like\LikeRepositoryEloquent;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\PostRepository;
use desabafai\domains\Post\PostRepositoryEloquent;
use desabafai\domains\User\User;
use desabafai\domains\User\UserRepository;
use desabafai\domains\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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

        Relation::morphMap([
            'posts'    => Post::class,
            'comments' => Comment::class,
            'users'    => User::class
        ]);
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
