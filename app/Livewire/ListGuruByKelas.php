<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Guru;

class ListGuruByKelas extends Component
{
    public $kelas;
    public $selectedKelasId;
    public $guru;

    public function mount()
    {
        $this->kelas = Kelas::all();
        $this->selectedKelasId = '';
        $this->guru = [];
    }

    public function updatedSelectedKelasId($value)
    {
        if ($value) {
            $this->guru = Guru::whereHas('kelas', function ($query) use ($value) {
                $query->where('kelas_id', $value);
            })->with('kelas')->get();
        } else {
            $this->guru = [];
        }
    }

    public function render()
    {
        return view('livewire.list-guru-by-kelas')->layout('layouts.app');
    }
}
?>