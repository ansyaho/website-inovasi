<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;

class Dumy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'mas admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456789')
            ]
        ];

        foreach($data as $ok => $val){
            User::create($val);
        }

         $jurusan = [
            [
                'nama' => 'IPA'
            ],
            [
                'nama' => 'IPS'
            ]
        ];

        foreach($jurusan as $jur => $rusan){
            Jurusan::create($rusan);
        }

        $kelas = [
            [
                'jurusan_id' => null,
                'nama' => 'X',
                'tingkat' => 1
            ],
            [
                'jurusan_id' => '1',
                'nama' => 'XI',
                'tingkat' => 2
            ],
            [
                'jurusan_id' => '2',
                'nama' => 'XI',
                'tingkat' => 2
            ],
            [
                'jurusan_id' => '1',
                'nama' => 'XII',
                'tingkat' => 3
            ],
            [
                'jurusan_id' => '2',
                'nama' => 'XII',
                'tingkat' => 3
            ]
        ];

        foreach($kelas as $kel => $las){
            Kelas::create($las);
        }

       
    }
}
