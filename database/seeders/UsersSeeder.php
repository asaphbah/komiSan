<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'password' => bcrypt('senha123'),
            'birth' => '1990-08-10',
            'username' => 'joaosilva',
            'bio' => 'Engenheiro de software apaixonado por programação e tecnologia.',
            'artist' => 0,
            'img_cover' => 'users/cover/cover1.jpg',
            'img_user' => 'users/usuario1.jpg',
        ]);

        User::create([
            'name' => 'Maria Oliveira',
            'email' => 'maria.oliveira@example.com',
            'password' => bcrypt('senha456'),
            'birth' => '1988-05-22',
            'username' => 'mariaoliveira',
            'bio' => 'Amante de viagens e da natureza. Explorando o mundo a cada passo.',
            'artist' => 1,
            'img_cover' => 'users/cover/cover2.jpg',
            'img_user' => 'users/usuario2.jpg',
        ]);

        User::create([
            'name' => 'Carlos Santos',
            'email' => 'carlos.santos@example.com',
            'password' => bcrypt('senha789'),
            'birth' => '1985-03-15',
            'username' => 'carlossantos',
            'bio' => 'Músico, cantor e compositor. Criando melodias que tocam a alma.',
            'artist' => 0,
            'img_cover' => 'users/cover/cover3.jpg',
            'img_user' => 'users/usuario3.jpg',
        ]);

        User::create([
            'name' => 'Ana Souza',
            'email' => 'ana.souza@example.com',
            'password' => bcrypt('senha101'),
            'birth' => '1993-12-20',
            'username' => 'anasouza',
            'bio' => 'Apaixonada por comida e aspirante a chef. Criando magia na cozinha.',
            'artist' => 1,
            'img_cover' => 'users/cover/cover4.jpg',
            'img_user' => 'users/usuario4.jpg',
        ]);
        User::create([
            'name' => 'Luciana Oliveira',
            'email' => 'luciana.oliveira@example.com',
            'password' => bcrypt('senha123'),
            'birth' => '1992-06-17',
            'username' => 'lucianaoliveira',
            'bio' => 'Apaixonada por arte e música. Buscando inspiração em todos os lugares.',
            'artist' => 0,
            'img_cover' => 'users/cover/cover5.jpg',
            'img_user' => 'users/usuario5.jpg',
        ]);

        User::create([
            'name' => 'Fernando Lima',
            'email' => 'fernando.lima@example.com',
            'password' => bcrypt('senha456'),
            'birth' => '1987-04-02',
            'username' => 'fernandolima',
            'bio' => 'Desenvolvedor front-end e amante de esportes ao ar livre.',
            'artist' => 1,
            'img_cover' => 'users/cover/cover6.jpg',
            'img_user' => 'users/usuario6.jpg',
        ]);

        User::create([
            'name' => 'Mariana Costa',
            'email' => 'mariana.costa@example.com',
            'password' => bcrypt('senha789'),
            'birth' => '1991-10-25',
            'username' => 'marianacosta',
            'bio' => 'Arquiteta apaixonada por design e inovação.',
            'artist' => 0,
            'img_cover' => 'users/cover/cover7.jpg',
            'img_user' => 'users/usuario7.jpg',
        ]);

        User::create([
            'name' => 'Ricardo Pereira',
            'email' => 'ricardo.pereira@example.com',
            'password' => bcrypt('senha101'),
            'birth' => '1995-08-15',
            'username' => 'ricardopereira',
            'bio' => 'Aventureiro e amante da natureza. Viajando e explorando o mundo.',
            'artist' => 1,
            'img_cover' => 'users/cover/cover8.jpg',
            'img_user' => 'users/usuario8.jpg',
        ]);

        User::create([
            'name' => 'Amanda Almeida',
            'email' => 'amanda.almeida@example.com',
            'password' => bcrypt('senha2021'),
            'birth' => '1989-12-30',
            'username' => 'amandaalmeida',
            'bio' => 'Professora apaixonada por educação e cultura. Transformando vidas.',
            'artist' => 0,
            'img_cover' => 'users/cover/cover9.jpg',
            'img_user' => 'users/usuario9.jpg',
        ]);

        User::create([
            'name' => 'Paulo Souza',
            'email' => 'paulo.souza@example.com',
            'password' => bcrypt('senha7890'),
            'birth' => '1986-07-05',
            'username' => 'paulosouza',
            'bio' => 'Empreendedor e amante da tecnologia. Inovando para um futuro melhor.',
            'artist' => 1,
            'img_cover' => 'users/cover/cover10.jpg',
            'img_user' => 'users/usuario10.jpg',
        ]);
    }
}
