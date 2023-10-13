<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 
     * codigo pra rodar o seeders
     * php artisan db:seed
     * 
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(TagsUserSeeders::class);
        $this->call(TagPostsSeeders::class);
        $this->call(LikeSeeders::class);
        $this->call(FollowersSeeders::class);
    }
}
