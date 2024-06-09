<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Peta extends Component
{
    public $clients;
    public $petas;

    public function render()
    {
        $this->clients = Client::all();
        $this->petas = Client::all(); // Assuming `Client` has the polygon data as well
        return view('livewire.peta', [
            'clients' => $this->clients,
            'petas' => $this->petas,
        ])->extends('layouts.app')->section('content');
    }
}

