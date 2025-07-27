<div class="container mx-auto p-5">
    <h1 class="text-2xl font-semibold mb-5 text-gray-900">Daftar Guru Per Kelas</h1>

    <div class="bg-white p-4 rounded-lg shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Kelas</th>
                    <th class="border p-2 text-left">Nama Guru</th>
                    <th class="border p-2 text-left">NIP</th>
                    <th class="border p-2 text-left">Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guruByKelas as $kelas_id => $kelasData)
                    @foreach($kelasData['guru'] as $index => $g)
                        <tr>
                            @if($index === 0)
                                <td class="border p-2" rowspan="{{ count($kelasData['guru']) }}">{{ $kelasData['kelas_name'] }}</td>
                            @endif
                            <td class="border p-2">{{ $g['nama'] }}</td>
                            <td class="border p-2">{{ $g['nip'] }}</td>
                            <td class="border p-2">{{ $g['mata_pelajaran'] }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="4" class="border p-2 text-center text-gray-600">Tidak ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>