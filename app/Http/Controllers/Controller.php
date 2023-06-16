<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

final class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(): JsonResponse
    {
        /** @var Post $post */
        $post = Post::find(1);

        return new JsonResponse([
            'post_title' => $post->title,
            'tag' => $post->tag->name,
        ]);
    }
}
