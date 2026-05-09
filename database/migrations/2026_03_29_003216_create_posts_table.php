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

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('images')->nullable();
            $table->bigInteger('views')->nullable()->default(0);
            $table->bigInteger('likes')->nullable()->default(0);
            $table->enum('category', ['nasional', 'riau', 'asn', 'ppk', 'pgri', 'karir'])->default('nasional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
