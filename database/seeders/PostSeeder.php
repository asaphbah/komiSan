<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Título do Primeiro Post',
            'comentario' => 'Conteúdo do primeiro post.',
            'user_id' => 1,
        ]);
        
        Post::create([
            'title' => 'Título do Segundo Post',
            'comentario' => 'Conteúdo do segundo post.',
            'user_id' => 2,
        ]);
        
        Post::create([
            'title' => 'Título do Terceiro Post',
            'comentario' => 'Conteúdo do terceiro post.',
            'user_id' => 3,
        ]);
        
        Post::create([
            'title' => 'Título do Quarto Post',
            'comentario' => 'Conteúdo do quarto post.',
            'user_id' => 4,
        ]);
        
        Post::create([
            'title' => 'Título do Quinto Post',
            'comentario' => 'Conteúdo do quinto post.',
            'user_id' => 5,
        ]);
        
        Post::create([
            'title' => 'Título do Sexto Post',
            'comentario' => 'Conteúdo do sexto post.',
            'user_id' => 6,
        ]);
        
        Post::create([
            'title' => 'Título do Sétimo Post',
            'comentario' => 'Conteúdo do sétimo post.',
            'user_id' => 7,
        ]);
        
        Post::create([
            'title' => 'Título do Oitavo Post',
            'comentario' => 'Conteúdo do oitavo post.',
            'user_id' => 8,
        ]);
        
        Post::create([
            'title' => 'Título do Nono Post',
            'comentario' => 'Conteúdo do nono post.',
            'user_id' => 9,
        ]);
        
        Post::create([
            'title' => 'Título do Décimo Post',
            'comentario' => 'Conteúdo do décimo post.',
            'user_id' => 10,
        ]);
        Post::create([
            'title' => 'Título do Primeiro Post',
            'comentario' => 'Conteúdo do primeiro post.',
            'user_id' => 1,
            'img_post' => 'posts/post1.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Segundo Post',
            'comentario' => 'Conteúdo do segundo post.',
            'user_id' => 2,
            'img_post' => 'posts/post2.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Terceiro Post',
            'comentario' => 'Conteúdo do terceiro post.',
            'user_id' => 3,
            'img_post' => 'posts/post3.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Quarto Post',
            'comentario' => 'Conteúdo do quarto post.',
            'user_id' => 4,
            'img_post' => 'posts/post4.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Quinto Post',
            'comentario' => 'Conteúdo do quinto post.',
            'user_id' => 5,
            'img_post' => 'posts/post5.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Sexto Post',
            'comentario' => 'Conteúdo do sexto post.',
            'user_id' => 6,
            'img_post' => 'posts/post6.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Sétimo Post',
            'comentario' => 'Conteúdo do sétimo post.',
            'user_id' => 7,
            'img_post' => 'posts/post7.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Oitavo Post',
            'comentario' => 'Conteúdo do oitavo post.',
            'user_id' => 8,
            'img_post' => 'posts/post8.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Nono Post',
            'comentario' => 'Conteúdo do nono post.',
            'user_id' => 9,
            'img_post' => 'posts/post9.jpg',
        ]);
        
        Post::create([
            'title' => 'Título do Décimo Post',
            'comentario' => 'Conteúdo do décimo post.',
            'user_id' => 10,
            'img_post' => 'posts/post10.jpg',
        ]);
    }
}
