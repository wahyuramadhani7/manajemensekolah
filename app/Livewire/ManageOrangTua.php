<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrangTua;
use App\Models\Siswa;

class ManageOrangTua extends Component
{
    public $orangTua;
    public $nama;
    public $no_telp;
    public $alamat;
    public $siswa_id;
    public $editId = null;
    public $siswa;

    public function mount()
    {
        $this->orangTua = OrangTua::with('siswa')->get();
        $this->siswa = Siswa::all();
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'siswa_id' => 'required|exists:siswa,id',
        ]);

        if ($this->editId) {
            $orangTua = OrangTua::find($this->editId);
            $orangTua->update([
                'nama' => $this->nama,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
                'siswa_id' => $this->siswa_id,
            ]);
        } else {
            OrangTua::create([
                'nama' => $this->nama,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
                'siswa_id' => $this->siswa_id,
            ]);
        }

        $this->resetForm();
        $this->orangTua = OrangTua::with('siswa')->get();
    }

    public function edit($id)
    {
        $orangTua = OrangTua::find($id);
        $this->editId = $id;
        $this->nama = $orangTua->nama;
        $this->no_telp = $orangTua->no_telp;
        $this->alamat = $orangTua->alamat;
        $this->siswa_id = $orangTua->siswa_id;
    }

    public function delete($id)
    {
        OrangTua::find($id)->delete();
        $this->orangTua = OrangTua::with('siswa')->get();
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->no_telp = '';
        $this->alamat = '';
        $this->siswa_id = '';
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.manage-orang-tua')->layout('layouts.app');
    }
}