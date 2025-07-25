<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guru;
use App\Models\Kelas;

class ManageGuru extends Component
{
    public $guru;
    public $nama;
    public $nip;
    public $mata_pelajaran;
    public $kelas_ids = [];
    public $editId = null;
    public $kelas;

    public function mount()
    {
        $this->guru = Guru::with('kelas')->get();
        $this->kelas = Kelas::all();
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:guru,nip,' . $this->editId,
            'mata_pelajaran' => 'required|string|max:100',
            'kelas_ids' => 'required|array|min:1',
            'kelas_ids.*' => 'exists:kelas,id',
        ]);

        if ($this->editId) {
            // Update
            $guru = Guru::find($this->editId);
            $guru->update([
                'nama' => $this->nama,
                'nip' => $this->nip,
                'mata_pelajaran' => $this->mata_pelajaran,
            ]);
            $guru->kelas()->sync($this->kelas_ids);
        } else {
            // Create
            $guru = Guru::create([
                'nama' => $this->nama,
                'nip' => $this->nip,
                'mata_pelajaran' => $this->mata_pelajaran,
            ]);
            $guru->kelas()->sync($this->kelas_ids);
        }

        $this->resetForm();
        $this->guru = Guru::with('kelas')->get(); // Refresh daftar guru
    }

    public function edit($id)
    {
        $guru = Guru::with('kelas')->find($id);
        $this->editId = $id;
        $this->nama = $guru->nama;
        $this->nip = $guru->nip;
        $this->mata_pelajaran = $guru->mata_pelajaran;
        $this->kelas_ids = $guru->kelas->pluck('id')->toArray();
    }

    public function delete($id)
    {
        Guru::find($id)->delete();
        $this->guru = Guru::with('kelas')->get(); // Refresh daftar guru
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->nip = '';
        $this->mata_pelajaran = '';
        $this->kelas_ids = [];
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.manage-guru')->layout('layouts.app');
    }
}
?>