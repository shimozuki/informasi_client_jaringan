<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Informasi Pelanggan') }}</div>

                    <div class="card-body">
                        {{-- add button --}}
                        <div class="row">

                            <div class="col-md-6">
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
                                            @forelse ($clients as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->panjang_kabel }}</td>
                                                <td>{{ $item->kecepatan_jaringan }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="tanahId({{ $item->id }})">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" wire:click="delete({{ $item->id }})">Delete</a>
                                                    <a href="#" class="btn btn-success" data-id="{{ $item->id }}">Aktif</a>
                                                    @else
                                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="tanahId({{ $item->id }})">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" wire:click="delete({{ $item->id }})">Delete</a>
                                                    @endif
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

                            {{-- KTP --}}
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" wire:model="ktp" required autocomplete="ktp">
                                @error('ktp')
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

                            {{-- SN Out --}}
                            <label for="sn_out" class="col-md-4 col-form-label text-md-right">{{ __('SN Out') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="sn_out" type="text" class="form-control @error('sn_out') is-invalid @enderror" name="sn_out" wire:model="sn_out" required autocomplete="sn_out">
                                @error('sn_out')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- ODP --}}
                            <label for="odp" class="col-md-4 col-form-label text-md-right">{{ __('ODP') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="odp" type="text" class="form-control @error('odp') is-invalid @enderror" name="odp" wire:model="odp" required autocomplete="odp">
                                @error('odp')
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

                            {{-- Teknisi --}}
                            <label for="teknisi" class="col-md-4 col-form-label text-md-right">{{ __('Teknisi') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="teknisi" type="text" class="form-control @error('teknisi') is-invalid @enderror" name="teknisi" wire:model="teknisi" required autocomplete="teknisi">
                                @error('teknisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Keterangan --}}
                            <label for="ket" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="ket" type="text" class="form-control @error('ket') is-invalid @enderror" name="ket" wire:model="ket" required autocomplete="ket">
                                @error('ket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Interface --}}
                            <label for="interface" class="col-md-4 col-form-label text-md-right">{{ __('Interface') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="interface" type="text" class="form-control @error('interface') is-invalid @enderror" name="interface" wire:model="interface" required autocomplete="interface">
                                @error('interface')
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

                            {{-- Panjang Kabel --}}
                            <label for="panjang_kabel" class="col-md-4 col-form-label text-md-right">{{ __('Panjang Kabel') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="panjang_kabel" type="text" class="form-control @error('panjang_kabel') is-invalid @enderror" name="panjang_kabel" wire:model="panjang_kabel" required autocomplete="panjang_kabel">
                                @error('panjang_kabel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah</button>
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

                            {{-- KTP --}}
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" wire:model="ktp" required autocomplete="ktp">
                                @error('ktp')
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

                            {{-- Panjang Kabel --}}
                            <label for="panjang_kabel" class="col-md-4 col-form-label text-md-right">{{ __('Panjang Kabel') }}</label>
                            <div class="col-md-6 mb-2">
                                <input id="panjang_kabel" type="text" class="form-control @error('panjang_kabel') is-invalid @enderror" wire:model="panjang_kabel" required autocomplete="panjang_kabel">
                                @error('panjang_kabel')
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
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @if($nama=='' || $ktp=='' || $alamat=='' || $lat=='' || $long=='' || $panjang_kabel=='' || $kecepatan_jaringan=='' || $no_tlpn=='' ) disabled @endif>Update</button>
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
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById('lat').value = position.coords.latitude;
        document.getElementById('long').value = position.coords.longitude;

        // Assuming you're using Livewire, trigger the update to Livewire properties
        @this.set('lat', position.coords.latitude);
        @this.set('long', position.coords.longitude);
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-success').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const id = button.getAttribute('data-id');
                const url = `/aktif/${id}`;

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Status updated successfully');
                            location.reload();
                            // You can also update the UI accordingly here
                        } else {
                            alert('Error: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>