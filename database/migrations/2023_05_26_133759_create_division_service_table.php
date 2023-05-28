<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('division_service', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('id_division')->nullable();
            $table->unsignedInteger('id_service')->nullable();

            $table->foreign('id_division')->references('id_division')->on('divisions')->onDelete('cascade');
            $table->foreign('id_service')->references('id_service')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_service');
    }



};
