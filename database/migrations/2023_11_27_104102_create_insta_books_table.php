<?php

use App\Models\Author;
use App\Models\Rate;
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
            $table->string('image');
            $table->string('title');
            $table->foreignIdFor(Author::class)->constrained();
            $table->year('year');
            $table->foreignIdFor(Genre::class)->constrained();
            $table->string('content');
            $table->foreignIdFor(Rate::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
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
