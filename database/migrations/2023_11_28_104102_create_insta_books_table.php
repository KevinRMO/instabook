<?php

use App\Models\Author;
use App\Models\Genre;
use App\Models\User;
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
        Schema::create('insta_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Author::class)->constrained();
            $table->integer('year');
            $table->foreignIdFor(Genre::class)->constrained();
            $table->string('content');
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
            $table->string('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insta_books');
    }
};
