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

        Schema::create('Services', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->string('date');
            $table->unsignedInteger('price');
            $table->timestamps();
            $table->foreign('sales_id')->references('id')->on('Sales')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        //
    }
};
