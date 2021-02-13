<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use Carbon\Carbon;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([ 
            'NIP' => '198509222020121001',
            'NIK' => '3515132209850006',
            'Nama' => 'Ulil Vidi Amri Noer',
            'Tanggal_Lahir' => Carbon::parse('1985-09-22'),
            'Email' => 'oelhil@gmail.com',
        ]);

        Pegawai::create([ 
            'NIP' => '199201292020122002',
            'NIK' => '1930201230000026',
            'Nama' => 'Nurmayani',
            'Tanggal_Lahir' => Carbon::parse('1992-01-29'),
            'Email' => 'oelhil@gmail.com',
        ]);

        Pegawai::create([ 
            'NIP' => '199506242020122001',
            'NIK' => '1930201230000143',
            'Nama' => 'Tiara Nabila Putri',
            'Tanggal_Lahir' => Carbon::parse('1995-06-24'),
            'Email' => 'oelhil@gmail.com',
        ]);
    }
}
