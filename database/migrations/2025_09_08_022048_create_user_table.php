<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name_lengkap',32);
            $table->string('nis_k',18);
            $table->date('tanggal_lahir',32);
            $table->text('alamat');
            $table->string('no_telp',18);
            $table->string('kelas',10);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alasan');
            $table->string('username')->unique(); 
            $table->string('password'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
