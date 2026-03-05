<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('session_rating', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id');
            $table->tinyInteger('rating');
            $table->datetime('created_at');
            $table->foreignId('session_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_rating');
    }
};
