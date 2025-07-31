<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Kelola Orang Tua</h1>

    <!-- Form Tambah/Edit -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" wire:model="nama" class="w-full p-2 border rounded">
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">No Telepon</label>
                <input type="text" wire:model="no_telp" class="w-full p-2 border rounded">
                @error('no_telp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat</label>
                <input type="text" wire:model="alamat" class="w-full p-2 border rounded">
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Siswa</label>
                <select wire:model="siswa_id" class="w-full p-2 border rounded">
                    <option value="">Pilih Siswa</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
                @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                {{ $editId ? 'Update' : 'Simpan' }}
            </button>
            @if($editId)
                <button type="button" wire:click="resetForm" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">Batal</button>
            @endif
        </form>
    </div>

    <!-- Tabel Daftar Orang Tua -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">No Telepon</th>
                    <th class="border p-2">Alamat</th>
                    <th class="border p-2">Siswa</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orangTua as $ot)
                    <tr>
                        <td class="border p-2">{{ $ot->nama }}</td>
                        <td class="border p-2">{{ $ot->no_telp ?? '-' }}</td>
                        <td class="border p-2">{{ $ot->alamat ?? '-' }}</td>
                        <td class="border p-2">{{ $ot->siswa ? $ot->siswa->nama : '-' }}</td>
                        <td class="border p-2">
                            <button wire:click="edit({{ $ot->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button wire:click="delete({{ $ot->id }})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border p-2 text-center">Belum ada data orang tua.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>