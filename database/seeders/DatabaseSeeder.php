<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Post::truncate();
        Tag::truncate();

        Tag::factory(3)->create();
        Post::factory(10)
            ->state(
                new Sequence(static fn(): array => [
                    'tagId' => 'Tag'.Tag::all()->random()->id,
                ])
            )
            ->create();
    }
}
