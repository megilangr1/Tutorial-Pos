<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswasTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'id_sekolah' => '1',
                'nama_siswa' => 'Putri Maharani',
                'whatsapp' => '085755667432',
                'facebook' => 'MaharaniPutri',
                'instagram' => 'maharani_',
                'email' => 'maharaniputri@mail.com',
                'jurusan' => '1',
                'keterangan' => null
            ],
            [
                'id' => 2,
                'id_sekolah' => '1',
                'nama_siswa' => 'Zyrlia Putri',
                'whatsapp' => '085867543241',
                'facebook' => 'ZyrliaPutri',
                'instagram' => 'zyrlia_putri',
                'email' => 'zyrliaputri@mail.com',
                'jurusan' => '1',
                'keterangan' => null
            ],
            [
                'id' => 3,
                'id_sekolah' => '2',
                'nama_siswa' => 'Destiani Putri',
                'whatsapp' => '085867443243',
                'facebook' => 'DestianiPutri',
                'instagram' => 'destiani_putri',
                'email' => 'destianiputri@mail.com',
                'jurusan' => '2',
                'keterangan' => null
            ],
            [
                'id' => 4,
                'id_sekolah' => '2',
                'nama_siswa' => 'Lukmanul Hakim',
                'whatsapp' => '085968543244',
                'facebook' => 'LukmanHakim',
                'instagram' => 'LukmanulHakim',
                'email' => 'destianiputri@mail.com',
                'jurusan' => '2',
                'keterangan' => null
            ]
        ];

        try {
            foreach ($data as $key => $value) {
                $check = Siswa::where('id', '=', $value['id'])->first();
                if ($check == null) {
                    Siswa::firstOrCreate($value);
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
