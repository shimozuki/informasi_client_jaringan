<?php

namespace App\Http\Livewire;

use App\Exports\ClientsExport;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;

class InfoSawah extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $perPage = 10;
    protected $queryString = ['search' => ['except' => ''], 'perPage'];

    public $nama, $ktp, $alamat, $no_tlpn, $sn_out, $odp, $kecepatan_jaringan, $teknisi, $ket, $interface, $lat, $long, $panjang_kabel;
    public $clientId;
    public $selectedClientId;

    public function mount()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nama = '';
        $this->ktp = '';
        $this->alamat = '';
        $this->no_tlpn = '';
        $this->sn_out = '';
        $this->odp = '';
        $this->kecepatan_jaringan = '';
        $this->teknisi = '';
        $this->ket = '';
        $this->interface = '';
        $this->lat = '';
        $this->long = '';
        $this->panjang_kabel = '';
        $this->clientId = null;
    }

    public function tanahId($id)
    {
        $this->selectedClientId = $id;
        // Dapatkan data client berdasarkan ID jika diperlukan
        $client = Client::find($id);

        // Set properties atau aksi lainnya
        if ($client) {
            $this->clientId = $client->id;
            $this->nama = $client->nama;
            $this->ktp = $client->ktp;
            $this->alamat = $client->alamat;
            $this->no_tlpn = $client->no_tlpn;
            $this->sn_out = $client->sn_out;
            $this->odp = $client->odp;
            $this->kecepatan_jaringan = $client->kecepatan_jaringan;
            $this->teknisi = $client->teknisi;
            $this->ket = $client->ket;
            $this->interface = $client->interface;
            $this->lat = $client->lat;
            $this->long = $client->long;
            $this->panjang_kabel = $client->panjang_kabel;
        }
    }

    public function render()
    {
        $clients = Client::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('alamat', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.info-client', [
            'clients' => $clients,
        ])->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ktp' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
            'sn_out' => 'required',
            'odp' => 'required',
            'kecepatan_jaringan' => 'required',
            'teknisi' => 'required',
            'ket' => 'required',
            'interface' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'panjang_kabel' => 'required',
        ]);

        Client::create([
            'nama' => $this->nama,
            'ktp' => $this->ktp,
            'alamat' => $this->alamat,
            'no_tlpn' => $this->no_tlpn,
            'sn_out' => $this->sn_out,
            'odp' => $this->odp,
            'kecepatan_jaringan' => $this->kecepatan_jaringan,
            'teknisi' => $this->teknisi,
            'ket' => $this->ket,
            'interface' => $this->interface,
            'lat' => $this->lat,
            'long' => $this->long,
            'panjang_kabel' => $this->panjang_kabel,
        ]);

        $this->resetInput();
        $this->emit('clientStore');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            $this->clientId = $id;
            $this->nama = $client->nama;
            $this->ktp = $client->ktp;
            $this->alamat = $client->alamat;
            $this->no_tlpn = $client->no_tlpn;
            $this->sn_out = $client->sn_out;
            $this->odp = $client->odp;
            $this->kecepatan_jaringan = $client->kecepatan_jaringan;
            $this->teknisi = $client->teknisi;
            $this->ket = $client->ket;
            $this->interface = $client->interface;
            $this->lat = $client->lat;
            $this->long = $client->long;
            $this->panjang_kabel = $client->panjang_kabel;
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'ktp' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
            'sn_out' => 'required',
            'odp' => 'required',
            'kecepatan_jaringan' => 'required',
            'teknisi' => 'required',
            'ket' => 'required',
            'interface' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'panjang_kabel' => 'required',
        ]);

        if ($this->clientId) {
            $client = Client::find($this->clientId);
            if ($client) {
                $client->update([
                    'nama' => $this->nama,
                    'ktp' => $this->ktp,
                    'alamat' => $this->alamat,
                    'no_tlpn' => $this->no_tlpn,
                    'sn_out' => $this->sn_out,
                    'odp' => $this->odp,
                    'kecepatan_jaringan' => $this->kecepatan_jaringan,
                    'teknisi' => $this->teknisi,
                    'ket' => $this->ket,
                    'interface' => $this->interface,
                    'lat' => $this->lat,
                    'long' => $this->long,
                    'panjang_kabel' => $this->panjang_kabel,
                ]);
                $this->resetInput();
                $this->emit('clientUpdate');
            }
        }
    }

    public function delete($id)
    {
        Client::find($id)->delete();
        $this->emit('clientDelete');
    }

    public function export()
    {
        return Excel::download(new ClientsExport, 'clients.xlsx');
    }
}
