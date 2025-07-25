<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;

class ManageSiswa extends Component
{
    public $siswa;
    public $nama;
    public $nis;
    public $kelas_id;
    public $editId = null;
    public $kelas;

    public function mount()
    {
        $this->siswa = Siswa::with('kelas')->get();
        $this->kelas = Kelas::all();
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $this->editId,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        if ($this->editId) {
            // Update
            $siswa = Siswa::find($this->editId);
            $siswa->update([
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id,
            ]);
        } else {
            // Create
            Siswa::create([
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id,
            ]);
        }

        $this->resetForm();
        $this->siswa = Siswa::with('kelas')->get(); // Refresh daftar siswa
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $this->editId = $id;
        $this->nama = $siswa->nama;
        $this->nis = $siswa->nis;
        $this->kelas_id = $siswa->kelas_id;
    }

    public function delete($id)
    {
        Siswa::find($id)->delete();
        $this->siswa = Siswa::with('kelas')->get(); // Refresh daftar siswa
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->nis = '';
        $this->kelas_id = '';
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.manage-siswa')->layout('layouts.app');
    }
}
?>