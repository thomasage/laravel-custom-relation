<?php
declare(strict_types=1);

namespace App\Models;

use App\Relations\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $tagId
 * @property ?Tag $tag
 */
final class Post extends Model
{
    use HasFactory;

    public function tag(): Taggable
    {
        return new Taggable($this);
    }
}
