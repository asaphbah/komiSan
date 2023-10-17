<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report_Tag;
use Illuminate\Http\Request;

class ReportTagController extends Controller
{
    public function show(){
        $reports = Report_Tag::all();
        return view('komisan.adm.tagsReport', compact('reports'));
    }
    public function create($tag_id)
    {
        return view('komisan.report.tagReport', compact('tag_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_text' => 'nullable|string|max:255',
            'user_id' => 'required|integer',
            'tag_id' => 'required|integer'
        ]);

        Report_Tag::create($request->all());

        return redirect()->back();
    }
}
