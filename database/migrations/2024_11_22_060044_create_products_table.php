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
        Schema::create('Product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('qty');
            $table->text('detail');
            $table->timestamps();
            $table->unsignedBigInteger('product_type_id'); 
            $table->foreign('product_type_id')->references('id')->on('product_types'); // เพิ่มคอลัมน์ created_at และ updated_at
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
