<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;

class ListSiswaByKelas extends Component
{
    public $siswa;

    public function mount()
    {
        
        $this->siswa = Siswa::with('kelas')
            ->orderBy('kelas_id')
            ->get();
    }

    public function render()
    {
        return view('livewire.list-siswa-by-kelas')->layout('layouts.app');
    }
}