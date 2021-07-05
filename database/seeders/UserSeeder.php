<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'nama'      => 'laboran',
          'username'  => 'laboran',
          'password'  => Hash::make('laboran'),
          'jabatan'   => 'laboran',
          'alamat'    => 'subang',
          'no_telp'   => '085723853284',
          'role'      => 'laboran',
        ], [
          'nama'      => 'wadek',
          'username'  => 'wadek',
          'password'  => Hash::make('wadek'),
          'jabatan'   => 'wadek',
          'alamat'    => 'subang',
          'no_telp'   => '085723853284',
          'role'      => 'wadek',
        ], [
          'nama'      => 'admin',
          'username'  => 'admin',
          'password'  => Hash::make('admin'),
          'jabatan'   => 'admin',
          'alamat'    => 'subang',
          'no_telp'   => '085723853284',
          'role'      => 'admin',
        ], [
          'nama'      => 'keuangan',
          'username'  => 'keuangan',
          'password'  => Hash::make('keuangan'),
          'jabatan'   => 'keuangan',
          'alamat'    => 'subang',
          'no_telp'   => '085723853284',
          'role'      => 'keuangan',
        ]
      ]);
    }
}
