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
        Schema::create('Schedules', function (Blueprint $table) {
            $table->id();
            $table->json('servicios');
            $table->string('customer_id', 10);
            // Clave foránea que referencia a la tabla products
            $table->foreign('customer_id')->references('id')->on('Customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Schedules');
    }
};
