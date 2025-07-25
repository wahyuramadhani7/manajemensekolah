<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Siswa;

class ListSiswaByKelas extends Component
{
    public $kelas;
    public $selectedKelasId;
    public $siswa;

    public function mount()
    {
        $this->kelas = Kelas::all();
        $this->selectedKelasId = '';
        $this->siswa = [];
    }

    public function updatedSelectedKelasId($value)
    {
        if ($value) {
            $this->siswa = Siswa::where('kelas_id', $value)->with('kelas')->get();
        } else {
            $this->siswa = [];
        }
    }

    public function render()
    {
        return view('livewire.list-siswa-by-kelas')->layout('layouts.app');
    }
}
?>