<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Gabungan Siswa dan Guru</h1>

    <div class="bg-white p-5 rounded-lg shadow-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-3 text-left">Kelas</th>
                    <th class="border p-3 text-left">Nama</th>
                    <th class="border p-3 text-left">NIS/NIP</th>
                    <th class="border p-3 text-left">Peran</th>
                    <th class="border p-3 text-left">Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataGabungan as $data)
                    @php
                        $totalRows = count($data['siswa']) + count($data['guru']);
                        $combined = array_merge($data['siswa'], $data['guru']);
                    @endphp
                    @if($totalRows > 0)
                        @foreach($combined as $index => $item)
                            <tr>
                                @if($index === 0)
                                    <td class="border p-3" rowspan="{{ $totalRows }}">{{ $data['kelas_nama'] }}</td>
                                @endif
                                <td class="border p-3">{{ $item['nama'] }}</td>
                                <td class="border p-3">{{ $item['nis'] }}</td>
                                <td class="border p-3">{{ $item['peran'] }}</td>
                                <td class="border p-3">{{ $item['mata_pelajaran'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                @empty
                    <tr>
                        <td colspan="5" class="border p-3 text-center text-gray-500">Tidak ada data siswa atau guru untuk ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>