<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Guru;

class ListGabungan extends Component
{
    public $dataGabungan;

    public function mount()
    {
        $siswa = Siswa::with('kelas')
            ->orderBy('kelas_id')
            ->get()
            ->groupBy('kelas_id');

        $guru = Guru::with(['kelas' => function ($query) {
            $query->orderBy('nama_kelas');
        }])
            ->get()
            ->groupBy(function ($guru) {
                return $guru->kelas->isNotEmpty() ? $guru->kelas->first()->id : 'no_class';
            });

        $this->dataGabungan = $siswa->map(function ($siswaPerKelas, $kelasId) use ($guru) {
            $kelas = $siswaPerKelas->first()->kelas;
            return [
                'kelas_id' => $kelasId,
                'kelas_nama' => $kelas ? $kelas->nama_kelas : 'Tidak Ada Kelas',
                'siswa' => $siswaPerKelas->map(function ($siswa) {
                    return [
                        'nama' => $siswa->nama,
                        'nis' => $siswa->nis,
                        'peran' => 'Siswa',
                        'mata_pelajaran' => '',
                    ];
                })->toArray(),
                'guru' => isset($guru[$kelasId]) ? $guru[$kelasId]->map(function ($g) {
                    return [
                        'nama' => $g->nama,
                        'nis' => $g->nip,
                        'peran' => 'Guru',
                        'mata_pelajaran' => $g->mata_pelajaran,
                    ];
                })->toArray() : [],
            ];
        })->merge([
            [
                'kelas_id' => 'no_class',
                'kelas_nama' => 'Tidak Ada Kelas',
                'siswa' => [],
                'guru' => isset($guru['no_class']) ? $guru['no_class']->map(function ($g) {
                    return [
                        'nama' => $g->nama,
                        'nis' => $g->nip,
                        'peran' => 'Guru',
                        'mata_pelajaran' => $g->mata_pelajaran,
                    ];
                })->toArray() : [],
            ]
        ])->filter(function ($data) {
            return !empty($data['siswa']) || !empty($data['guru']);
        })->sortBy('kelas_nama')->values()->toArray();
    }

    public function render()
    {
        return view('livewire.list-gabungan')->layout('layouts.app');
    }
}