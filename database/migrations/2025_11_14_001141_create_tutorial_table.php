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
        Schema::create('tutorial', function (Blueprint $table) {
            $table->id();
            $table->string('judul',20);
            $table->text('tutor_pertama');
            $table->text('tutor_kedua');
            $table->text('tutor_ketiga');
            $table->text('tutor_keempat');
            $table->text('tutor_kelima');
            $table->text('tutor_keenam')->nullable();
            $table->text('tutor_ketujuh')->nullable();
            $table->text('tutor_kedelapan')->nullable();
            $table->text('tutor_kesembilan')->nullable();
            $table->text('tutor_kesepuluh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorial');
    }
};
