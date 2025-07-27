<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guru;

class ListGuruByKelas extends Component
{
    public $guruByKelas;

    public function mount()
    {
    
        $guru = Guru::select('guru.*')
            ->leftJoin('guru_kelas', 'guru.id', '=', 'guru_kelas.guru_id')
            ->leftJoin('kelas', 'guru_kelas.kelas_id', '=', 'kelas.id')
            ->orderByRaw('COALESCE(kelas.nama_kelas, ""), guru.nama')
            ->with('kelas')
            ->get()
            ->groupBy(function ($guru) {
                return $guru->kelas->isNotEmpty() ? $guru->kelas->first()->id : 'no_class';
            });

        $this->guruByKelas = $guru->mapWithKeys(function ($guruList, $kelas_id) {
            $kelas_name = $kelas_id !== 'no_class' ? $guruList->first()->kelas->first()->nama_kelas : 'Tidak Ada Kelas';
            return [
                $kelas_id => [
                    'kelas_name' => $kelas_name,
                    'guru' => $guruList->map(function ($g) {
                        return [
                            'nama' => $g->nama,
                            'nip' => $g->nip,
                            'mata_pelajaran' => $g->mata_pelajaran,
                        ];
                    })->toArray(),
                ],
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.list-guru-by-kelas')->layout('layouts.app');
    }
}