<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Kelola Siswa</h1>

    <!-- Form Tambah/Edit -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" wire:model="nama" class="w-full p-2 border rounded">
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">NIS</label>
                <input type="text" wire:model="nis" class="w-full p-2 border rounded">
                @error('nis') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Kelas</label>
                <select wire:model="kelas_id" class="w-full p-2 border rounded">
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                {{ $editId ? 'Update' : 'Simpan' }}
            </button>
            @if($editId)
                <button type="button" wire:click="resetForm" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">Batal</button>
            @endif
        </form>
    </div>

    <!-- Tabel Daftar Siswa -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">NIS</th>
                    <th class="border p-2">Kelas</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $s)
                    <tr>
                        <td class="border p-2">{{ $s->nama }}</td>
                        <td class="border p-2">{{ $s->nis }}</td>
                        <td class="border p-2">{{ $s->kelas ? $s->kelas->nama_kelas : '-' }}</td>
                        <td class="border p-2">
                            <button wire:click="edit({{ $s->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button wire:click="delete({{ $s->id }})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-2 text-center">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>