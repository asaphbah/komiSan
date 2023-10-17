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
}
