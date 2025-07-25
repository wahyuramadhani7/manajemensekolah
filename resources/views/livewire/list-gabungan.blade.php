<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Laporan Gabungan Siswa, Kelas, dan Guru</h1>

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

    <!-- Tabel Laporan Gabungan -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nama Siswa</th>
                    <th class="border p-2">NIS</th>
                    <th class="border p-2">Kelas</th>
                    <th class="border p-2">Nama Guru</th>
                    <th class="border p-2">Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataGabungan as $data)
                    <tr>
                        <td class="border p-2">{{ $data['siswa_nama'] }}</td>
                        <td class="border p-2">{{ $data['siswa_nis'] }}</td>
                        <td class="border p-2">{{ $data['kelas_nama'] }}</td>
                        <td class="border p-2">{{ $data['guru_nama'] }}</td>
                        <td class="border p-2">{{ $data['guru_mata_pelajaran'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border p-2 text-center">Pilih kelas untuk melihat laporan gabungan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>