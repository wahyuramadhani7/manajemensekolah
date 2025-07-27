<div class="container mx-auto p-5">
    <h1 class="text-2xl font-semibold mb-5 text-gray-900">Daftar Siswa Per Kelas</h1>

    <div class="bg-white p-4 rounded-lg shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Kelas</th>
                    <th class="border p-2 text-left">Nama Siswa</th>
                    <th class="border p-2 text-left">NIS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswaByKelas as $kelas_id => $kelasData)
                    @foreach($kelasData['siswa'] as $index => $s)
                        <tr>
                            @if($index === 0)
                                <td class="border p-2" rowspan="{{ count($kelasData['siswa']) }}">{{ $kelasData['kelas_name'] }}</td>
                            @endif
                            <td class="border p-2">{{ $s['nama'] }}</td>
                            <td class="border p-2">{{ $s['nis'] }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="3" class="border p-2 text-center text-gray-600">Tidak ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>