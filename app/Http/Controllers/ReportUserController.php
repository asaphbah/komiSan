<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report_User;
use Illuminate\Http\Request;

class ReportUserController extends Controller
{
    public function show(){
        $reports = Report_User::all();
        return view('komisan.adm.userReport', compact('reports'));
    }
    public function create($user_id)
    {
        return view('komisan.report.userReport', compact('user_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_text' => 'nullable|string|max:255',
            'user_id' => 'required|integer',
            'reported_user_id' => 'required|integer'
        ]);

        Report_User::create($request->all());

        return redirect()->back();
    }
}
