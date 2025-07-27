<div class="container mx-auto p-5">
    <h1 class="text-2xl font-semibold mb-5">Daftar Guru Berdasarkan Kelas</h1>

    @php
        $currentKelas = null;
    @endphp

    @forelse($guru->sortBy(function($guru) { return $guru->kelas->first()->nama_kelas ?? ''; }) as $g)
        @if ($g->kelas->isNotEmpty() && $currentKelas !== $g->kelas->first()->nama_kelas)
            @if ($currentKelas !== null)
                </tbody>
                </table>
                </div>
            @endif
            <div class="bg-white p-4 rounded-lg shadow mb-5">
                <h2 class="text-lg font-medium mb-3 text-gray-800">
                    Kelas: {{ $g->kelas->first()->nama_kelas ?? 'Tidak Ada Kelas' }}
                </h2>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">Nama Guru</th>
                            <th class="border p-2 text-left">NIP</th>
                            <th class="border p-2 text-left">Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
        @endif
        @if ($g->kelas->isNotEmpty())
            <tr>
                <td class="border p-2">{{ $g->nama }}</td>
                <td class="border p-2">{{ $g->nip }}</td>
                <td class="border p-2">{{ $g->mata_pelajaran }}</td>
            </tr>
        @endif
        @php
            $currentKelas = $g->kelas->first()->nama_kelas ?? null;
        @endphp
    @empty
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-center text-gray-500">Tidak ada data guru.</p>
        </div>
    @endforelse

    @if ($guru->isNotEmpty())
        </tbody>
        </table>
        </div>
    @endif

    
    @if ($guru->where('kelas', 'isEmpty')->isNotEmpty())
        <div class="bg-white p-4 rounded-lg shadow mb-5">
            <h2 class="text-lg font-medium mb-3 text-gray-800">Kelas: Tidak Ada Kelas</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">Nama Guru</th>
                        <th class="border p-2 text-left">NIP</th>
                        <th class="border p-2 text-left">Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru->where('kelas', 'isEmpty') as $g)
                        <tr>
                            <td class="border p-2">{{ $g->nama }}</td>
                            <td class="border p-2">{{ $g->nip }}</td>
                            <td class="border p-2">{{ $g->mata_pelajaran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>