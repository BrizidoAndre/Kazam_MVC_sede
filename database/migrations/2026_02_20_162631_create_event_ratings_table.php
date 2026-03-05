<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id');
            $table->tinyInteger('rating');
            $table->datetime('created_at');
            $table->foreignId('event_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_ratings');
    }
};
