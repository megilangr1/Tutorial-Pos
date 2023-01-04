<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\JurusanSekolah;
use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getJurusanSekolah(Request $request)
    {
        $jurusanSekolah = JurusanSekolah::select('id_jurusan', 'jurusans.name')->where('id_sekolah', '=', $request->id_sekolah)
            ->join('jurusans', 'jurusans.id', '=', 'jurusan_sekolahs.id_jurusan');

        if ($request->search && $request->search != null) {
            $jurusanSekolah = $jurusanSekolah->where(function ($q) use ($request) {
                $q->where('jurusans.name', 'like', '%'. $request->search .'%');
            });
        }

        $jurusanSekolah = $jurusanSekolah->get()->toArray();
        return response()->json($jurusanSekolah);
    }

    public function getKelasJurusan(Request $request)
    {
        $kelasJurusan = Kelas::select('id', 'nama_kelas')
            ->where('id_sekolah', '=', $request->id_sekolah)
            ->where('id_jurusan', '=', $request->id_jurusan);

        if ($request->search && $request->search != null) {
            $kelasJurusan = $kelasJurusan->where(function ($q) use ($request) {
                $q->where('nama_kelas', 'like', '%'. $request->search .'%');
            });
        }

        $kelasJurusan = $kelasJurusan->get()->toArray();
        return response()->json($kelasJurusan);
    }

    public function getDataJurusan(Request $request)
    {
        $jurusan = Jurusan::where('name', 'like', '%'. $request->search .'%')->get()->toArray();
        
        return response()->json($jurusan);
    }

    public function getDataUser(Request $request)
    {
        $dataUser = User::with(['roles'])->select('id', 'name');

        if ($request->search && $request->search != null) {
            $dataUser = $dataUser->where(function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->search .'%');
            })->orWhereHas('roles', function ($q) use ($request) {
                $q->where('name', 'like', '%'. $request->search .'%');
            });
        }

        if ($request->level && $request->level != null) {
            $dataUser = $dataUser->whereHas('roles', function ($q) use ($request) {
                $levelCondition = $request->level_condition ??  '>';

                $q->where('level', $levelCondition, $request->level);
            });
        }

        if ($request->limit && $request->limit != null) {
            $dataUser = $dataUser->limit($request->limit);
        }

        $dataUser = $dataUser->get()->toArray();
        return response()->json($dataUser);
    }

    public function getDataSekolah(Request $request)
    {
        $sekolah = Sekolah::where('name', 'like', '%'. $request->search .'%');

        if ($request->limit && $request->limit != null) {
            $sekolah = $sekolah->limit($request->limit);
        }
        
        $sekolah = $sekolah->get()->toArray();
        
        return response()->json($sekolah);
    }
}
