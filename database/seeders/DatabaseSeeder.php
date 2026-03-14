<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | Create Admin User
        |--------------------------------------------------------------------------
        */

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@blog.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Create Blog Settings
        |--------------------------------------------------------------------------
        */

        Setting::create([
            'site_name' => 'My Blog',
            'tagline' => 'A modern Laravel blog template',
            'contact_email' => 'contact@blog.com',
            'contact_phone' => '+961 70 000 000',
            'about_text' => 'This is a demo blog created for the template preview.',
            'footer_text' => '© 2026 My Blog. All rights reserved.',
            'comments_enabled' => true,
            'posts_per_page' => 9,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }


        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'SEO', 'slug' => 'seo'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Startup', 'slug' => 'startup'],
            ['name' => 'Design', 'slug' => 'design'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }


        /*
        |--------------------------------------------------------------------------
        | Create Demo Posts
        |--------------------------------------------------------------------------
        */

        $categoryIds = Category::pluck('id')->toArray();
        $tagIds = Tag::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {

            $post = Post::create([
                'user_id' => $admin->id,
                'category_id' => fake()->randomElement($categoryIds),
                'title' => "Sample Blog Post {$i}",
                'slug' => "sample-blog-post-{$i}",
                'excerpt' => fake()->sentence(20),
                'content' => fake()->paragraphs(10, true),
                'featured_image' => null,
                'status' => 'published',
                'published_at' => now(),
                'is_featured' => $i <= 2,
                'views' => fake()->numberBetween(10, 200),
            ]);

            $post->tags()->attach(
                fake()->randomElements($tagIds, rand(1, 3))
            );


            /*
            |--------------------------------------------------------------------------
            | Demo Comments
            |--------------------------------------------------------------------------
            */

            for ($c = 1; $c <= rand(1, 3); $c++) {

                Comment::create([
                    'post_id' => $post->id,
                    'name' => fake()->name(),
                    'email' => fake()->safeEmail(),
                    'comment' => fake()->paragraph(),
                    'status' => 'approved',
                ]);

            }

        }

    }
}