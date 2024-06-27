<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'KTP',
            'Alamat',
            'No Telepon',
            'SN Out',
            'ODP',
            'Kecepatan Jaringan',
            'Teknisi',
            'Keterangan',
            'Interface',
            'Latitude',
            'Longitude',
            'Panjang Kabel',
            'Created At',
            'Updated At'
        ];
    }
}

