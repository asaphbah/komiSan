<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WithoutModelEvents::class;

        $likeCount = 100;
        $userIdStart = 1;
        $userIdEnd = 10;
        $postIdStart = 1;
        $postIdEnd = 20;

        // Array para rastrear as combinações já criadas
        $createdLikes = [];

        for ($i = 0; $i < $likeCount; $i++) {
            $userId = mt_rand($userIdStart, $userIdEnd);
            $postId = mt_rand($postIdStart, $postIdEnd);

            // Verifique se essa combinação já foi criada
            $key = $userId . '-' . $postId;
            if (in_array($key, $createdLikes)) {
                continue;  // Evite duplicatas
            }

            // Adicione ao array de combinações criadas
            $createdLikes[] = $key;

            Like::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }
    }
}