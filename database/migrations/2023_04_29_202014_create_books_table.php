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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable(true);
            $table->string('author');
            $table->text('description')->nullable(true);
            $table->unsignedFloat('rating')->default(5.0);
            $table->string('cover');
            $table->timestamps();

            $table->unsignedBigInteger('category_id');
            $table->index('category_id', 'book_category_idx');
            $table->foreign('category_id', 'book_category_fk')->on('categories')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
