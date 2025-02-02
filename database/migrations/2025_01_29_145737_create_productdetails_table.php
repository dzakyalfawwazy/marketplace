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
        Schema::create('productdetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('products')->onDelete('cascade');
            $table->decimal('weight');
            $table->string('size')->default('None');
            $table->string('color')->default('None');
            $table->decimal('baseprice',10,2)->default(0);
            $table->decimal('sellprice',10,2)->default(0);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->decimal('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productdetails');
    }
};
