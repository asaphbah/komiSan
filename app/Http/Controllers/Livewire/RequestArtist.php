<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Request_artist;
use Livewire\Component;

class RequestArtist extends Component
{
    public $orders;
    public $requests;
    public $view;

    public function mount($view)
    {
        $this->view = $view;
        $this->loadRequests();
    }

    public function render()
    {
        return view('livewire.request-artist');
    }

    public function loadRequests()
    {
        if ($this->view === 'user') {
            $this->requests = Request_artist::where('user_id', auth()->user()->id)->get();
        } elseif ($this->view === 'artist') {
            $this->requests = Request_artist::where('artist_id', auth()->user()->id)->get();
        }
    }
    public function process(){
        if ($this->view === 'user') {
            $this->requests = Request_artist::where('user_id', auth()->user()->id)
                ->where('status', 'A') // Filtrar por status 'A'
                ->get();
        } elseif ($this->view === 'artist') {
            $this->requests = Request_artist::where('artist_id', auth()->user()->id)
                ->where('status', 'A') // Filtrar por status 'A'
                ->get();
        }
    }
    public function concluded(){
        if ($this->view === 'user') {
            $this->requests = Request_artist::where('user_id', auth()->user()->id)
                ->where('status', 'C') // Filtrar por status 'A'
                ->get();
        } elseif ($this->view === 'artist') {
            $this->requests = Request_artist::where('artist_id', auth()->user()->id)
                ->where('status', 'C') // Filtrar por status 'A'
                ->get();
        }
    }
    public function pending(){
        if ($this->view === 'user') {
            $this->requests = Request_artist::where('user_id', auth()->user()->id)
                ->where('status', 'P') // Filtrar por status 'A'
                ->get();
        } elseif ($this->view === 'artist') {
            $this->requests = Request_artist::where('artist_id', auth()->user()->id)
                ->where('status', 'P') // Filtrar por status 'A'
                ->get();
        }
    }
    public function conclud_request($request_id){
        
        $request = Request_artist::find($request_id);
        $request->status = 'C';  // Definindo o status como 'C' (concluído)
        $request->save();
        
    }
    public function accepted_request($request_id){
        
        $request = Request_artist::find($request_id); 
        $request->status = 'A';  // Definindo o status como 'A' (Accepted)
        $request->save();
       
    }
    public function recused_request($request_id){
        $request = Request_artist::find($request_id);
        $request->status = 'R';  // Definindo o status como 'R' (recused)
        $request->save();
       
    }
    public function getDaysRemaining($deadline)
    {
        $now = now();
        $deadlineDate = \Carbon\Carbon::createFromFormat('Y-m-d', $deadline);
    
        if ($now < $deadlineDate) {
            // O prazo ainda não passou
            $daysRemaining = $now->diffInDays($deadlineDate);
            return $daysRemaining . ' dias restantes';
        } else {
            // O prazo já passou
            $daysPassed = $deadlineDate->diffInDays($now);
            return $daysPassed . ' dias após o prazo';
        }
    }
    
    
    
}
