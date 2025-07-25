<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            // Tambah kolom kelas_id sebagai foreign key
            $table->unsignedBigInteger('kelas_id')->nullable()->after('nis');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            
            // Hapus kolom kelas yang lama
            $table->dropColumn('kelas');
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            // Kembalikan kolom kelas dan hapus foreign key
            $table->string('kelas')->nullable();
            $table->dropForeign(['kelas_id']);
            $table->dropColumn('kelas_id');
        });
    }
};
?>