@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow shadow-md">
                <div class="card-header bg-dark text-white text-center ">
                    <img class="img-fluid " src="{{ asset('telkom.png') }}" alt="logo" width="20%" height="20%">
                    {{-- sig potensi sawa koltim --}}
                    <h3 class=" mt-2">Sistem Informasi Pelanggan Internet</h3>
                    <h1>Sumbawa Besar</h1>

                </div>

                <div class="card-body">
                    <div class="row">
                    </div>
                    {{-- info tanah --}}
                    <div class="row">
                        <div class="col-md-3 mt-1">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center">
                                    <i class="fas fa-wifi fa-2x "></i>
                                    <h5 class="card-title text-center">Jenis Jaringan</h5>
                                </div>
                                <div class="card-body bg-dark text-white">
                                    <h1 class="text-center">{{ count($Jaringan) }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- pemilik lahan --}}
                        <div class="col-md-3 mt-1">
                            <div class="card">
                                <div class="card-header bg-warning text-white text-center">
                                    <i class="fas fa-users fa-2x "></i>
                                    <h5 class="card-title text-center">Pelanggan</h5>
                                </div>
                                <div class="card-body bg-dark text-white">
                                    <h1 class="text-center">{{ count($Client) }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- info tanah --}}
                        <div class="col-md-3 mt-1">
                            <div class="card">
                                <div class="card-header bg-success text-white text-center">
                                    {{-- building  --}}
                                    <i class="fas fa-building fa-2x "></i>
                                    <h5 class="card-title text-center">Kelurahan</h5>
                                </div>
                                <div class="card-body bg-dark text-white">
                                    <h1 class="text-center">0</h1>
                                </div>
                            </div>
                        </div>
                        {{-- Potensi --}}
                        <div class="col-md-3 mt-1">
                            <div class="card">
                                <div class="card-header bg-danger text-white text-center">
                                    {{-- fa tanah --}}
                                    <i class="fas fa-globe fa-2x "></i>
                                    <h5 class="card-title text-center">Area</h5>
                                </div>
                                <div class="card-body bg-dark text-white">
                                    <h1 class="text-center">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
