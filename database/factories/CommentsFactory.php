<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence,
            'post_id' => Posts::factory(),
            'user_id' => User::factory(),
            'parent_id' => Comments::factory()
        ];
    }
}
