<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Request_artist;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function store(Request $request){
         $validatedData = $request->validate([
        'request_id'=> 'required|integer',
        'artist_id' => 'required|integer',
        'client_id' => 'required|integer',
        'rating' => 'required|integer',
        'assessment_type' => 'required|string',
        'comment' => 'nullable|string',
    ]);

    // Crie uma nova avaliação com os dados validados
    $assessment = Assessment::create($validatedData);
        // Redireciona para alguma rota após a criação (exemplo: lista de avaliações)
        return redirect()->route('request.show');
    }
    public function create($id){
        $request = Request_artist::find($id); 

        if ($request->status != 'C') {
            $request->status = 'C'; 
            $request->save();
            return view('komisan.forms.cadastroAvaliacao', compact('request'));
        }
        return view('komisan.forms.cadastroAvaliacao', compact('request'));
    }
}
