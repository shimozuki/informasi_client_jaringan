<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Informasi Pelanggan') }}</div>

                    <div class="card-body">
                        {{-- add button --}}
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</a>
                            </div>
                        </div>
                        {{-- end add button --}}
                        <br>
                        {{-- perpage --}}
                        <div class="row">
                            <div class="col-md-6">
                                <select wire:model="perPage" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" wire:model="search" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        {{-- table --}}
                        <div class="row mt-2">
                            <div class=" col-md-12">
                                <div class="table-responsive">
                                    <table class="table  table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Jensi Jaringan</th>
                                                <th>Kecepatan Jaringan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($infotanahs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->jenis_jaringan }}</td>
                                                <td>{{ $item->kecepatan_jaringan }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="tanahId({{ $item->id }})">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="tanahId({{ $item->id }})">Delete</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- addModal --}}
<div wire:ignore.self class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form wire:submit.prevent="store">
                    <div class="form-group row">
                        {{-- Nama --}}
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" wire:model="nama" required autocomplete="nama" autofocus>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" wire:model="alamat" required autocomplete="alamat">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Latitude --}}
                        <label for="lat" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="lat" type="text" class="form-control @error('lat') is-invalid @enderror" name="lat" wire:model="lat" required autocomplete="lat">
                            @error('lat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Longitude --}}
                        <label for="long" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="long" type="text" class="form-control @error('long') is-invalid @enderror" name="long" wire:model="long" required autocomplete="long">
                            @error('long')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Jenis Jaringan --}}
                        <label for="jenis_jaringan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Jaringan') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="jenis_jaringan" type="text" class="form-control @error('jenis_jaringan') is-invalid @enderror" name="jenis_jaringan" wire:model="jenis_jaringan" required autocomplete="jenis_jaringan">
                            @error('jenis_jaringan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Kecepatan Jaringan --}}
                        <label for="kecepatan_jaringan" class="col-md-4 col-form-label text-md-right">{{ __('Kecepatan Jaringan') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="kecepatan_jaringan" type="text" class="form-control @error('kecepatan_jaringan') is-invalid @enderror" name="kecepatan_jaringan" wire:model="kecepatan_jaringan" required autocomplete="kecepatan_jaringan">
                            @error('kecepatan_jaringan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- No Telepon --}}
                        <label for="no_tlpn" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="no_tlpn" type="text" class="form-control @error('no_tlpn') is-invalid @enderror" name="no_tlpn" wire:model="no_tlpn" required autocomplete="no_tlpn">
                            @error('no_tlpn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @if($nama=='' || $alamat=='' || $lat=='' || $long=='' || $jenis_jaringan=='' || $kecepatan_jaringan=='' || $no_tlpn=='' ) disabled @endif>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end addModal --}}


{{-- editModal --}}
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form wire:submit.prevent="update">
                    <div class="form-group row">
                        {{-- Nama --}}
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" required autocomplete="nama" autofocus>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" required autocomplete="alamat">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Latitude --}}
                        <label for="lat" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="lat" type="text" class="form-control @error('lat') is-invalid @enderror" wire:model="lat" required autocomplete="lat">
                            @error('lat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Longitude --}}
                        <label for="long" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="long" type="text" class="form-control @error('long') is-invalid @enderror" wire:model="long" required autocomplete="long">
                            @error('long')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Jenis Jaringan --}}
                        <label for="jenis_jaringan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Jaringan') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="jenis_jaringan" type="text" class="form-control @error('jenis_jaringan') is-invalid @enderror" wire:model="jenis_jaringan" required autocomplete="jenis_jaringan">
                            @error('jenis_jaringan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Kecepatan Jaringan --}}
                        <label for="kecepatan_jaringan" class="col-md-4 col-form-label text-md-right">{{ __('Kecepatan Jaringan') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="kecepatan_jaringan" type="text" class="form-control @error('kecepatan_jaringan') is-invalid @enderror" wire:model="kecepatan_jaringan" required autocomplete="kecepatan_jaringan">
                            @error('kecepatan_jaringan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- No Telepon --}}
                        <label for="no_tlpn" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
                        <div class="col-md-6 mb-2">
                            <input id="no_tlpn" type="text" class="form-control @error('no_tlpn') is-invalid @enderror" wire:model="no_tlpn" required autocomplete="no_tlpn">
                            @error('no_tlpn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @if($nama=='' || $alamat=='' || $lat=='' || $long=='' || $jenis_jaringan=='' || $kecepatan_jaringan=='' || $no_tlpn=='' ) disabled @endif>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end editModal --}}


    {{-- deleteModal --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kamu Yakin akan Menghapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end deleteModal --}}
</div>
