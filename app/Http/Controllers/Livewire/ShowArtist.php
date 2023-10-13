<?php

namespace App\Http\Controllers\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowArtist extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::where('artist', 0)->get();
        return view('livewire.show-artist');
    }
}
