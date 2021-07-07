<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mitras')->insert([
        [
          'kode_mitra'  => '1',
          'nama_mitra'  => 'M. Bagas Setia',
          'alamat'      => 'Sagalaherang',
          'kontak'      => '085723853284'
        ], [
          'kode_mitra'  => '2',
          'nama_mitra'  => 'Firizki',
          'alamat'      => 'Tambakan',
          'kontak'      => '085723853284'
        ], [
          'kode_mitra'  => '3',
          'nama_mitra'  => 'Rivaldo Nugraha',
          'alamat'      => 'Pamanukan',
          'kontak'      => '085723853284'
        ], [
          'kode_mitra'  => '4',
          'nama_mitra'  => 'Febri',
          'alamat'      => 'Subang',
          'kontak'      => '085723853284'
        ]
      ]);
    }
}
