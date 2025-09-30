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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->nullable();
            $table->string('productid')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('quantity')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->default("pending");
            $table->string('publish')->default("1");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
