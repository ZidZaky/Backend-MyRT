<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->string('NIK')->primary(); // Primary Key
            $table->string('NamaLengkap');
            $table->string('JenisKelamin');
            $table->string('TempatLahir');
            $table->string('Agama');
            $table->string('Pendidikan');
            $table->string('Pekerjaan');
            $table->string('StatusPernikahan');
            $table->string('StatusDalamKeluarga');
            $table->string('Kewarganegaraan');
            $table->string('NamaAyah');
            $table->string('NamaIbu');
            $table->bigInteger('NoKK')->unsigned(); // Foreign Key

            $table->foreign('NoKK')
                ->references('NoKK')
                ->on('data_kartu_keluargas') // Matches table name in the other migration
                ->onDelete('cascade'); // Cascade on Delete

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluargas');
    }
}
