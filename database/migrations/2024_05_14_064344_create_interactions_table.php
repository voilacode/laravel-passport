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
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->string('client_slug');
            $table->string('name');
            $table->string('phone');
            $table->string('interaction_date');
            $table->string('interaction_type');
            $table->string('interaction_tag');
            $table->string('duration');
            $table->string('caller_name');
            $table->string('caller_phone');
            $table->string('status');
            $table->string('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
