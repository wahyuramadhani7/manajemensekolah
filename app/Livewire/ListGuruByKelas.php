<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guru;

class ListGuruByKelas extends Component
{
    public $guru;

    public function mount()
    {
     
        $this->guru = Guru::with(['kelas' => function ($query) {
            $query->orderBy('nama_kelas');
        }])->get();
    }

    public function render()
    {
        return view('livewire.list-guru-by-kelas')->layout('layouts.app');
    }
}