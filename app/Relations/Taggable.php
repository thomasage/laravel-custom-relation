<?php
declare(strict_types=1);

namespace App\Relations;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @property Post $parent
 * @property Tag|Builder $query
 */
final class Taggable extends Relation
{
    private const PREFIX = 'Tag';

    public function __construct(Post $parent)
    {
        parent::__construct(Tag::query(), $parent);
    }

    public function addConstraints(): void
    {
        // Nothing to do here
    }

    /**
     * @param Post[] $models
     */
    public function addEagerConstraints(array $models): void
    {
        $prefixLength = strlen(self::PREFIX);
        $ids = [];
        foreach ($models as $model) {
            if (!str_starts_with($model->tagId, self::PREFIX)) {
                continue;
            }
            $ids[] = (int)substr($model->tagId, $prefixLength);
        }
        $this->query->whereIn('ID', $ids);
    }

    /**
     * @param Post[] $models
     * @param string $relation
     * @return Post[]
     */
    public function initRelation(array $models, $relation): array
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related);
        }

        return $models;
    }

    /**
     * @param Post[] $models
     * @param Collection<Tag> $results
     * @param string $relation
     * @return Post[]
     */
    public function match(array $models, Collection $results, $relation): array
    {
        foreach ($models as $post) {
            $post->setRelation(
                $relation,
                $results->filter(
                    static fn(Model $model): bool => $model instanceof Tag
                        && $post->tagId === self::PREFIX.$model->id
                )->first()
            );
        }

        return $models;
    }

    public function getResults(): ?Tag
    {
        return $this->query->first();
    }
}
