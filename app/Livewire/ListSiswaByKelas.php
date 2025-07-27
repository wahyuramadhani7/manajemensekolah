<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;

class ListSiswaByKelas extends Component
{
    public $siswaByKelas;

    public function mount()
    {
      
        $siswa = Siswa::select('siswa.*')
            ->leftJoin('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->orderByRaw('COALESCE(kelas.nama_kelas, "")')
            ->with('kelas')
            ->get()
            ->groupBy('kelas_id');

        $this->siswaByKelas = $siswa->mapWithKeys(function ($siswaList, $kelas_id) {
            return [
                $kelas_id => [
                    'kelas_name' => $siswaList->first()->kelas ? $siswaList->first()->kelas->nama_kelas : 'Belum Ada Kelas',
                    'siswa' => $siswaList->map(function ($s) {
                        return [
                            'nama' => $s->nama,
                            'nis' => $s->nis,
                        ];
                    })->toArray(),
                ],
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.list-siswa-by-kelas')->layout('layouts.app');
    }
}