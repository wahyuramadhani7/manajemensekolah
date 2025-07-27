<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Gabungan Siswa, Kelas, dan Guru</h1>

    @forelse($dataGabungan as $data)
        <div class="bg-white p-5 rounded-lg shadow-lg mb-6">
            <h2 class="text-xl font-medium mb-4 text-gray-900">Kelas: {{ $data['kelas_nama'] }}</h2>

            <h3 class="text-lg font-medium mb-2 text-gray-700">Daftar Siswa</h3>
            <table class="w-full border-collapse mb-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3 text-left">Nama Siswa</th>
                        <th class="border p-3 text-left">NIS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data['siswa'] as $siswa)
                        <tr>
                            <td class="border p-3">{{ $siswa['nama'] }}</td>
                            <td class="border p-3">{{ $siswa['nis'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="border p-3 text-center text-gray-500">Tidak ada siswa di kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h3 class="text-lg font-medium mb-2 text-gray-700">Daftar Guru</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-3 text-left">Nama Guru</th>
                        <th class="border p-3 text-left">NIP</th>
                        <th class="border p-3 text-left">Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data['guru'] as $guru)
                        <tr>
                            <td class="border p-3">{{ $guru['nama'] }}</td>
                            <td class="border p-3">{{ $guru['nip'] }}</td>
                            <td class="border p-3">{{ $guru['mata_pelajaran'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border p-3 text-center text-gray-500">Tidak ada guru di kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @empty
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <p class="text-center text-gray-500">Tidak ada data siswa atau guru untuk ditampilkan.</p>
        </div>
    @endforelse
</div>