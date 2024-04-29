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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('client_slug')->default('super');
            $table->string('slug');
            $table->longText('details')->nullable();
            $table->text('group')->nullable();
            $table->text('subgroup')->nullable();
            $table->longText('data')->nullable();
            $table->string('zone_code')->nullable();
            $table->string('current_city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('status')->default('1');
            $table->string('c1')->nullable();
            $table->string('c2')->nullable();
            $table->string('c3')->nullable();
            $table->string('c4')->nullable();
            $table->string('c5')->nullable();
            $table->string('c6')->nullable();
            $table->string('c7')->nullable();
            $table->string('c8')->nullable();
            $table->string('c9')->nullable();
            $table->string('c10')->nullable();
            $table->string('c11')->nullable();
            $table->string('c12')->nullable();
            $table->string('c13')->nullable();
            $table->string('c14')->nullable();
            $table->string('c15')->nullable();
            $table->integer('subscribe_phone')->nullable();
            $table->integer('subscribe_email')->nullable();
            $table->DateTime('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
