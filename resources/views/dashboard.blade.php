<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-8">
                    <a href="/dashboard" class="flex items-center space-x-2">
                        <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
                        <span class="text-xl font-bold text-gray-800">Sistem Sekolah</span>
                    </a>
                </div>

                <!-- User Info -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">
                        <i class="fas fa-user-circle mr-2"></i>
                        {{ auth()->user()->name }}
                    </span>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                <i class="fas fa-home text-blue-600 mr-3"></i>
                Dashboard
            </h1>
            <p class="text-gray-600">Selamat datang di sistem manajemen sekolah. Pilih menu di bawah untuk mulai mengelola data.</p>
        </div>

        <!-- Menu Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kelola Siswa -->
            <a href="/siswa" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Siswa</h3>
                    <p class="text-gray-600 text-sm">Tambah, edit, dan kelola data siswa</p>
                </div>
            </a>

            <!-- Kelola Kelas -->
            <a href="/kelas" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-chalkboard text-green-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Kelas</h3>
                    <p class="text-gray-600 text-sm">Atur dan kelola kelas-kelas sekolah</p>
                </div>
            </a>

            <!-- Kelola Guru -->
            <a href="/guru" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-chalkboard-teacher text-purple-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Guru</h3>
                    <p class="text-gray-600 text-sm">Tambah dan kelola data guru</p>
                </div>
            </a>

            <!-- Kelola Orang Tua -->
            <a href="/orang-tua" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-user-friends text-yellow-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Orang Tua</h3>
                    <p class="text-gray-600 text-sm">Tambah, edit, dan kelola data orang tua</p>
                </div>
            </a>

            <!-- Siswa Berdasarkan Kelas -->
            <a href="/siswa-by-kelas" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-orange-100 p-3 rounded-full">
                            <i class="fas fa-users text-orange-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Siswa per Kelas</h3>
                    <p class="text-gray-600 text-sm">Lihat daftar siswa berdasarkan kelas</p>
                </div>
            </a>

            <!-- Guru Berdasarkan Kelas -->
            <a href="/guru-by-kelas" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-teal-100 p-3 rounded-full">
                            <i class="fas fa-user-tie text-teal-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Guru per Kelas</h3>
                    <p class="text-gray-600 text-sm">Lihat pembagian guru berdasarkan kelas</p>
                </div>
            </a>

            <!-- Laporan Gabungan -->
            <a href="/laporan-gabungan" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-chart-bar text-red-600 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Gabungan</h3>
                    <p class="text-gray-600 text-sm">Lihat laporan lengkap sistem sekolah</p>
                </div>
            </a>
        </div>
    </div>

    @livewireScripts
</body>
</html>