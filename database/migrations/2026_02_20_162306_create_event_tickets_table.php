<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->index();
            $table->string('name')->nullable();
            $table->decimal('cost')->nullable();
            $table->string('special_validity')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_tickets');
    }
};
