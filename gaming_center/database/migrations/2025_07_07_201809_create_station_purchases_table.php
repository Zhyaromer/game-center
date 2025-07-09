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
        Schema::create('station_purchases', function (Blueprint $table) {
            $table->id('station_purchase_id');
            $table->tinyInteger('quantity')->default(1);
            $table->double('price');
            $table->unsignedBigInteger('occupied_station_id');
            $table->unsignedBigInteger('market_item_id');
            $table->foreign('occupied_station_id')->references('occupied_station_id')->on('occupied_stations')->onDelete('cascade');
            $table->foreign('market_item_id')->references('market_item_id')->on('market_items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_purchases');
    }
};
