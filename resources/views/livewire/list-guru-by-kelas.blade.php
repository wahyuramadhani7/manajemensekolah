<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Guru Berdasarkan Kelas</h1>

    <!-- Dropdown Pilih Kelas -->
    <div class="mb-6">
        <label class="block text-gray-700">Pilih Kelas</label>
        <select wire:model.live="selectedKelasId" class="w-full p-2 border rounded">
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabel Daftar Guru -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">NIP</th>
                    <th class="border p-2">Mata Pelajaran</th>
                    <th class="border p-2">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guru as $g)
                    <tr>
                        <td class="border p-2">{{ $g->nama }}</td>
                        <td class="border p-2">{{ $g->nip }}</td>
                        <td class="border p-2">{{ $g->mata_pelajaran }}</td>
                        <td class="border p-2">{{ $g->kelas->pluck('nama_kelas')->join(', ') ?: '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-2 text-center">Pilih kelas untuk melihat daftar guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>