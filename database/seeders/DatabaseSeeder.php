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
    
        $this->call(TagSeeder::class);
 
    }
}
