<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Guru;

class ListGabungan extends Component
{
    public $kelas;
    public $selectedKelasId;
    public $dataGabungan;

    public function mount()
    {
        $this->kelas = Kelas::all();
        $this->selectedKelasId = '';
        $this->dataGabungan = [];
    }

    public function updatedSelectedKelasId($value)
    {
        if ($value) {
            $this->dataGabungan = Siswa::where('kelas_id', $value)
                ->with(['kelas', 'kelas.guru'])
                ->get()
                ->map(function ($siswa) {
                    return [
                        'siswa_nama' => $siswa->nama,
                        'siswa_nis' => $siswa->nis,
                        'kelas_nama' => $siswa->kelas ? $siswa->kelas->nama_kelas : '-',
                        'guru_nama' => $siswa->kelas ? $siswa->kelas->guru->pluck('nama')->join(', ') : '-',
                        'guru_mata_pelajaran' => $siswa->kelas ? $siswa->kelas->guru->pluck('mata_pelajaran')->join(', ') : '-',
                    ];
                });
        } else {
            $this->dataGabungan = [];
        }
    }

    public function render()
    {
        return view('livewire.list-gabungan')->layout('layouts.app');
    }
}
?>