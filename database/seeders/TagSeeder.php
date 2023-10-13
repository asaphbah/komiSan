<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WithoutModelEvents::class;

        Tag::create(['tag' => 'Tecnologia']);
        Tag::create(['tag' => 'Esportes']);
        Tag::create(['tag' => 'Moda']);
        Tag::create(['tag' => 'Comida']);
        Tag::create(['tag' => 'Viagens']);
        Tag::create(['tag' => 'Música']);
        Tag::create(['tag' => 'Cinema']);
        Tag::create(['tag' => 'Arte']);
        Tag::create(['tag' => 'Política']);
        Tag::create(['tag' => 'Saúde']);
        Tag::create(['tag' => 'Educação']);
        Tag::create(['tag' => 'Negócios']);
        Tag::create(['tag' => 'Natureza']);
        Tag::create(['tag' => 'Cultura']);
        Tag::create(['tag' => 'Livros']);
        Tag::create(['tag' => 'Carros']);
        Tag::create(['tag' => 'Fitness']);
        Tag::create(['tag' => 'Animais']);
        Tag::create(['tag' => 'Fotografia']);
        Tag::create(['tag' => 'Animes']);
        Tag::create(['tag' => 'AAAAAAAAA']);
    
    
    }
}
