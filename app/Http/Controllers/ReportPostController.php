<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report_Post;
use Illuminate\Http\Request;

class ReportPostController extends Controller
{
    public function show(){
        $reports = Report_Post::all();
        return view('komisan.adm.postReport', compact('reports'));
    }
    public function create($post_id)
    {
        return view('komisan.report.postReport', compact('post_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_text' => 'nullable|string|max:255',
            'user_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);

        Report_Post::create([
            'report_text' => $request->report_text,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id
        ]);
        
        return redirect()->back();
    }

}
