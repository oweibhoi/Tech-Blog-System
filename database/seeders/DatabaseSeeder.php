<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Posts::truncate();
        
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $tech = Category::create([
            'name' => 'Technology'
        ]);
        $life = Category::create([
            'name' => 'Lifestyle'
        ]);
        $financial = Category::create([
            'name' => 'Financial'
        ]);

        Posts::create([
            'title' => 'Technology Trending',
            'excerpt' => 'This is all about technology',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna accumsan, ornare dui at, tincidunt felis. Sed nibh quam, ullamcorper at elit sed, molestie pharetra felis. Aenean ipsum elit, sagittis quis ornare vehicula, commodo a est. Duis sit amet pulvinar quam. Cras ac porttitor justo, et posuere sapien. In sit amet lectus eget nulla maximus sodales in eget mauris. Nunc ac felis eu tellus suscipit porttitor finibus eget tellus. Aenean in neque vitae velit malesuada dapibus eu ut quam. Sed ornare, mi at congue interdum, lacus tortor iaculis ante, id fermentum libero ligula ac erat. Aenean ac lectus tempus, molestie lectus non, mattis magna. Proin at dolor ac lorem malesuada pellentesque nec ut eros. Pellentesque enim mi, commodo vel tristique eget, tempor eget arcu. Maecenas posuere eu dui in ultricies. Nunc vehicula tincidunt libero at lacinia. Suspendisse in urna libero.',
            'category_id' => $tech->id,
            'user_id' => $user1->id
        ]
        );
        Posts::create(
        [
            'title' => 'Lifestyle Habits',
            'excerpt' => 'This is all about lifestyle',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna accumsan, ornare dui at, tincidunt felis. Sed nibh quam, ullamcorper at elit sed, molestie pharetra felis. Aenean ipsum elit, sagittis quis ornare vehicula, commodo a est. Duis sit amet pulvinar quam. Cras ac porttitor justo, et posuere sapien. In sit amet lectus eget nulla maximus sodales in eget mauris. Nunc ac felis eu tellus suscipit porttitor finibus eget tellus. Aenean in neque vitae velit malesuada dapibus eu ut quam. Sed ornare, mi at congue interdum, lacus tortor iaculis ante, id fermentum libero ligula ac erat. Aenean ac lectus tempus, molestie lectus non, mattis magna. Proin at dolor ac lorem malesuada pellentesque nec ut eros. Pellentesque enim mi, commodo vel tristique eget, tempor eget arcu. Maecenas posuere eu dui in ultricies. Nunc vehicula tincidunt libero at lacinia. Suspendisse in urna libero.',
            'category_id' => $life->id,
            'user_id' => $user1->id
        ]
        );
        Posts::create(
        [
            'title' => 'Financial Stability',
            'excerpt' => 'This is all about financial',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna accumsan, ornare dui at, tincidunt felis. Sed nibh quam, ullamcorper at elit sed, molestie pharetra felis. Aenean ipsum elit, sagittis quis ornare vehicula, commodo a est. Duis sit amet pulvinar quam. Cras ac porttitor justo, et posuere sapien. In sit amet lectus eget nulla maximus sodales in eget mauris. Nunc ac felis eu tellus suscipit porttitor finibus eget tellus. Aenean in neque vitae velit malesuada dapibus eu ut quam. Sed ornare, mi at congue interdum, lacus tortor iaculis ante, id fermentum libero ligula ac erat. Aenean ac lectus tempus, molestie lectus non, mattis magna. Proin at dolor ac lorem malesuada pellentesque nec ut eros. Pellentesque enim mi, commodo vel tristique eget, tempor eget arcu. Maecenas posuere eu dui in ultricies. Nunc vehicula tincidunt libero at lacinia. Suspendisse in urna libero.',
            'category_id' => $financial->id,
            'user_id' => $user2->id
        ]
        );
    }
}
