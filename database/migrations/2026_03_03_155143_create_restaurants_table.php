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
         Schema::dropIfExists('restaurants'); 
         
        Schema::create('restaurants', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // link to users
        $table->string('name');
        $table->string('cuisine_type');
        $table->decimal('rating', 2, 1)->default(0);
        $table->text('description')->nullable();
        $table->string('phone');
        $table->string('address');
        $table->string('city');
        $table->string('state')->nullable();
        $table->string('zip')->nullable();
        $table->boolean('is_approved')->default(false);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
