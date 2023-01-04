<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class MainIndex extends Component
{
    public $dataKategori = [];

    public $state = [];
    public $params = [
        'id' => null,
        'nama' => null,
        'keterangan' => null,
    ];

    public function mount()
    {
        $this->state = $this->params;
    }

    public function render()
    {
        $getData = Kategori::withTrashed()->paginate(5);

        return view('livewire.kategori.main-index', [
            'kategoriData' => $getData
        ]);
    }

    public function saveData()
    {
        $this->resetErrorBag();

        $this->validate([
            'state.nama' => 'required|string',
            'state.keterangan' => 'nullable|string',
        ]);

        try {
            $create = Kategori::create([
                'nama' => $this->state['nama'],
                'keterangan' => $this->state['keterangan'],
            ]);

            $this->emit('success', 'Data di-Tambahkan !');

            $this->reset('state');
            $this->state = $this->params;
        } catch (\Exception $e) {
            $this->emit('error', 'Terjadi Kesalahan !');
        }
    }

    public function dummy()
    {
        dd("OK");
    }
}
