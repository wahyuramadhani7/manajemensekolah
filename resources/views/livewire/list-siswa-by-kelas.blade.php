<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Daftar Siswa Per Kelas</h1>

    @php
        $currentKelasId = null;
    @endphp

    @forelse($siswa as $s)
        @if ($currentKelasId !== $s->kelas_id)
            @if ($currentKelasId !== null)
                </tbody>
                </table>
                </div>
            @endif
            <div class="bg-gray-100 p-5 rounded-md shadow-md mb-4">
                <h2 class="text-lg font-semibold mb-3">
                    Kelas: {{ $s->kelas ? $s->kelas->nama_kelas : 'Belum Ada Kelas' }}
                </h2>
                <table class="w-full border-collapse bg-white">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="border p-3 text-left">Nama Siswa</th>
                            <th class="border p-3 text-left">NIS</th>
                        </tr>
                    </thead>
                    <tbody>
        @endif
                        <tr>
                            <td class="border p-3">{{ $s->nama }}</td>
                            <td class="border p-3">{{ $s->nis }}</td>
                        </tr>
        @php
            $currentKelasId = $s->kelas_id;
        @endphp
    @empty
        <div class="bg-gray-100 p-5 rounded-md shadow-md">
            <p class="text-center text-gray-600">Tidak ada data siswa.</p>
        </div>
    @endforelse

    @if ($siswa->isNotEmpty())
        </tbody>
        </table>
        </div>
    @endif
</div>