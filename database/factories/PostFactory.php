<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
final class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
        ];
    }
}
