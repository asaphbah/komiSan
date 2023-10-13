<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create(){
        return view('komisan.forms.cadastroPost');
    }
    public function store(Request $request)
    {
        try {
            // Criação do post
            $post = new Post();
            $post->title = $request->postTitle;
            $post->comentario = $request->postComment;
            $post->user_id = Auth::id();
            // Aqui você salva a imagem no servidor e armazena o caminho no banco de dados
            if ($request->hasFile('img_post')) {
                $extension = $request->file('img_post')->getClientOriginalExtension();
                $fileName = Str::random(20) . '.' . $extension; // Gera um nome aleatório para o arquivo
                $data['img_post'] = $request->file('img_post')->storeAs('posts', $fileName);
                $post->img_post = $data['img_post'];
                $post->save();
            }
            $post->save();
            // Processamento das tags
            $tagsArray = explode('#', $request->postTags);
            foreach ($tagsArray as $tag) {
                $tag = trim($tag);
                if (!empty($tag)) {
                    // Verifica se a tag já existe no banco
                    $existingTag = Tag::where('tag', $tag)->first();
    
                    if (!$existingTag) {
                        // Se não existir, cria a tag
                        $newTag = new Tag();
                        $newTag->tag = $tag;
                        $newTag->save();
                        $existingTag = $newTag;
                    }
    
                    // Associa a tag ao post
                    $post->tags()->attach($existingTag->id);
                }
            }
    
            // Redireciona para a página de perfil do usuário
            return redirect()->route('profile.komisan')->with('success', 'Post criado com sucesso!');
        } catch (\Exception $e) {
            // Se houver uma exceção, retorna com uma mensagem de erro
            return redirect()->route('post.create')->with('error', 'Erro ao criar o post: ' . $e->getMessage());
        }

    }
    public function post_unico($id) {
        $post = Post::find($id);

        return view('komisan.post_unico', compact('post'));
    }
    public function home(){
        return view('komisan.posts');
    }
}