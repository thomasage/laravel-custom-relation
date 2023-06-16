<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
final class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(),
        ];
    }
}
