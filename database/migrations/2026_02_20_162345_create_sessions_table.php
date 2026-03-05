<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->string('speaker')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->enum('type', ['talk', 'workshop']);
            $table->decimal('cost')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
