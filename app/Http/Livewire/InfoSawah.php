<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class InfoSawah extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $perPage = 10;
    protected $queryString = ['search' => ['except' => ''], 'perPage'];

    protected $infotanahs;

    public $nama;
    public $alamat;
    public $lat;
    public $long;
    public $jenis_jaringan;
    public $kecepatan_jaringan;
    public $no_tlpn;
    public function mount()
    {
        $this->infotanahs = Client::paginate($this->perPage);
    }

    private function resetInput()
    {
        $this->nama = '';
        $this->alamat = '';
        $this->lat = '';
        $this->long = '';
        $this->jenis_jaringan = '';
        $this->kecepatan_jaringan = '';
        $this->no_tlpn = '';
    }
    public function render()
    {
        $this->infotanahs = Client::where('jenis_jaringan', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.info-sawah', [
            'infotanahs' => $this->infotanahs,
        ])->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'jenis_jaringan' => 'required',
            'kecepatan_jaringan' => 'required',
            'no_tlpn' => 'required',
        ]);

        Client::create([
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'lat' => $this->lat,
            'long' => $this->long,
            'jenis_jaringan' => $this->jenis_jaringan,
            'kecepatan_jaringan' => $this->kecepatan_jaringan,
            'no_tlpn' => $this->no_tlpn,
        ]);

        $this->resetInput();
        $this->emit('clientStore');
    }


    public function tanahId($id)
    {
        $client = Client::find($id);
        $this->id = $id;
        $this->nama = $client->nama;
        $this->alamat = $client->alamat;
        $this->lat = $client->lat;
        $this->long = $client->long;
        $this->jenis_jaringan = $client->jenis_jaringan;
        $this->kecepatan_jaringan = $client->kecepatan_jaringan;
        $this->no_tlpn = $client->no_tlpn;
    }


    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'jenis_jaringan' => 'required',
            'kecepatan_jaringan' => 'required',
            'no_tlpn' => 'required',
        ]);

        if ($this->infotanah_id) {
            $client = Client::find($this->infotanah_id);
            $client->update([
                'nama' => $this->nama,
                'alamat' => $this->alamat,
                'lat' => $this->lat,
                'long' => $this->long,
                'jenis_jaringan' => $this->jenis_jaringan,
                'kecepatan_jaringan' => $this->kecepatan_jaringan,
                'no_tlpn' => $this->no_tlpn,
            ]);
            $this->resetInput();
            $this->emit('infotanahUpdate');
        }
    }


    public function delete()
    {
        if ($this->infotanah_id) {
            Client::find($this->infotanah_id)->delete();
            $this->emit('infotanahDelete');
        }
    }
}
