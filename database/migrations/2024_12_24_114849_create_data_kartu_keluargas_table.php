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
        Schema::create('data_kartu_keluargas', function (Blueprint $table) {
            $table->bigInteger('NoKK')->unsigned()->primary(); // Family Card Number
            $table->string('alamat'); // Address
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kartu_keluargas');
    }
};
