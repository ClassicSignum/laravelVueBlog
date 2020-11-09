<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\Post::class,10)->create();
        factory(App\Category::class,10)->create();
        factory(App\User::class,10)->create();
        // User::factory()
        //     ->times(10)
        //     ->create();
        // Category::factory()
        //     ->times(10)
        //     ->create();
        // Post::factory()
        //     ->times(10)
        //     ->create();
    }
}
