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
        Schema::table('Schedules', function (Blueprint  $table) {
            $table->foreignId('vehicle_id')->references('id')->on('Vehicles')->onDelete('cascade');
            $table->enum('state',['Pendiente','Completado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
