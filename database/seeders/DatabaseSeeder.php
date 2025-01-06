<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $category = Category::factory()->create();

        $articles = Article::factory(3)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $tag = Tag::factory()->create();

        $articles[0]->tags()->attach($tag);
    }
}
