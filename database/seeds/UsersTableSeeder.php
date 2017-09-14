<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \desabafai\domains\User\User::truncate();
        \desabafai\domains\Post\Post::truncate();
        //$users = factory(App\User2::class, 3)->make();
        //$users = factory(\desabafai\domains\User2\User2::class, 50)->create();


        factory(\desabafai\domains\User\User::class, 10)->create();
        factory(\desabafai\domains\Post\Post::class, 10)->create();

    }
}
