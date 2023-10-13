<?php

namespace Database\Seeders;

use App\Models\Post_Tag;
use App\Models\PostTag; // Corrigido o nome do modelo
use Illuminate\Database\Seeder;

class TagPostsSeeders extends Seeder
{
    public function run(): void
    {
        $postCount = 20;
        $tagCount = 20;

        for ($postId = 1; $postId <= $postCount; $postId++) {
            $numTags = mt_rand(1, 3);

            $tagIds = range(1, $tagCount);
            shuffle($tagIds);
            $tagIds = array_slice($tagIds, 0, $numTags);

            foreach ($tagIds as $tagId) {
                Post_Tag::create([  // Corrigido o nome do modelo
                    'post_id' => $postId,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }
}