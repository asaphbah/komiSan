<?php

namespace Database\Seeders;

use App\Models\Follower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WithoutModelEvents::class;

        $userCount = 10; // Supondo 10 usuários

        for ($i = 1; $i <= $userCount; $i++) {
            $followerId = $i;
            $followingIds = [
                ($i % $userCount) + 1, // Próximo usuário
                ($i % $userCount) + 2, // Próximo usuário após o próximo
            ];

            foreach ($followingIds as $followingId) {
                // Certifique-se de que os IDs de following sejam válidos
                if ($followingId <= $userCount) {
                    Follower::create([
                        'follower' => $followerId,
                        'following' => $followingId,
                    ]);
                }
            }
        }
    }
}



