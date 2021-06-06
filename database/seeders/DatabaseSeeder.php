<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create()->each(function($user) {
            Blog::factory(random_int(2, 5))->create(['user_id' => $user])->each(function ($blog) {
                Comment::factory(random_int(1, 3))->create(['blog_id' => $blog]);
            });
        });
    }
}
