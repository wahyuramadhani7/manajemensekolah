<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    @livewireStyles
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-blue-500 p-4">
            <div class="container mx-auto flex justify-between">
                <div>
                    <a href="/dashboard" class="text-white text-lg font-bold">Sekolah</a>
                    <a href="/siswa" class="text-white ml-4 hover:underline">Kelola Siswa</a>
                    <a href="/kelas" class="text-white ml-4 hover:underline">Kelola Kelas</a>
                    <a href="/guru" class="text-white ml-4 hover:underline">Kelola Guru</a>
                    <a href="/siswa-by-kelas" class="text-white ml-4 hover:underline">Siswa Berdasarkan Kelas</a>
                    <a href="/guru-by-kelas" class="text-white ml-4 hover:underline">Guru Berdasarkan Kelas</a>
                    <a href="/laporan-gabungan" class="text-white ml-4 hover:underline">Laporan Gabungan</a>
                </div>
                <div>
                    <span class="text-white">{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white ml-4 hover:underline">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard</h1>
            <p>Selamat, Anda berhasil login!</p>
        </div>
    </div>
    @livewireScripts
</body>
</html>