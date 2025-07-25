<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class ManageKelas extends Component
{
    public $kelas;
    public $nama_kelas;
    public $editId = null;

    public function mount()
    {
        $this->kelas = Kelas::all();
    }

    public function save()
    {
        $this->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas,' . $this->editId,
        ]);

        if ($this->editId) {
            // Update
            $kelas = Kelas::find($this->editId);
            $kelas->update([
                'nama_kelas' => $this->nama_kelas,
            ]);
        } else {
            // Create
            Kelas::create([
                'nama_kelas' => $this->nama_kelas,
            ]);
        }

        $this->resetForm();
        $this->kelas = Kelas::all(); // Refresh daftar kelas
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $this->editId = $id;
        $this->nama_kelas = $kelas->nama_kelas;
    }

    public function delete($id)
    {
        Kelas::find($id)->delete();
        $this->kelas = Kelas::all(); // Refresh daftar kelas
    }

    public function resetForm()
    {
        $this->nama_kelas = '';
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.manage-kelas')->layout('layouts.app');
    }
}
?>