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
        Schema::create('occupied_stations', function (Blueprint $table) {
            $table->id('occupied_station_id');
            $table->timestamp('start_time')->useCurrent();
            $table->dateTime('end_time')->default(null)->nullable();
            $table->integer('duration')->default(0);
            $table->double('price');
            $table->enum('status', ['active', 'ended'])->default('active');
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('station_id')->on('stations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupied_stations');
    }
};
