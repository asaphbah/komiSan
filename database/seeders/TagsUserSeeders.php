<?php

namespace Database\Seeders;

use App\Models\tag_user;
use App\Models\TagUser; // Corrigido o nome do modelo
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsUserSeeders extends Seeder
{
    public function run(): void
    {
        WithoutModelEvents::class;

        $userCount = 10;
        $tagCount = 20;

        for ($userId = 1; $userId <= $userCount; $userId++) {
            $isArtist = ($userId % 2 === 0) && ($userId <= 10);
            $numTags = mt_rand(1, 5);

            $tagIds = range(1, $tagCount);
            shuffle($tagIds);
            $tagIds = array_slice($tagIds, 0, $numTags);

            foreach ($tagIds as $tagId) {
                $status = ($isArtist && $tagId % 2 === 0) ? 1 : 0;

                tag_user::create([  // Corrigido o nome do modelo
                    'user_id' => $userId,
                    'tag_id' => $tagId,
                    'status' => $status,
                ]);
            }
        }
    }
}