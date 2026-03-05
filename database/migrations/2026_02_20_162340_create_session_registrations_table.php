<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('session_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id');
            $table->integer('session_id')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_registrations');
    }
};
