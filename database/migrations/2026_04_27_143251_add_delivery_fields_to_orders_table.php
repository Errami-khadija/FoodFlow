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
       Schema::table('orders', function (Blueprint $table) {
    $table->string('full_name')->after('restaurant_id');
    $table->string('phone')->after('full_name');
    $table->string('address')->after('phone');
    $table->string('city')->after('address');
    $table->string('zip')->after('city');

    $table->string('payment_method')->after('zip');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
