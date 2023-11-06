<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tagShow){
        $tag = Tag::where('tag',$tagShow)->first();

        return view('komisan.tags', compact('tag'));
    }
    public function store($id){
        $tag = Tag::find($id);
        $user = auth()->user();
        $user->tags()->attach($tag);
        return redirect()->back();
    }
    
    public function destroy($id){
        $tag = Tag::find($id);
        $user = auth()->user();
        $user->tags()->detach($tag);
        return redirect()->back();
    }
    
}
