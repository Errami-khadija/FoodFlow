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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('image')->nullable(); // restaurant image
            $table->decimal('deliveryFee', 5, 2)->default(0); // delivery fee
            $table->integer('deliveryTime')->default(30); // delivery time in minutes
            $table->boolean('open_orClose')->default(true); // true = open, false = closed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn(['image', 'deliveryFee', 'deliveryTime', 'open_orClose']);
        });
    }
};
