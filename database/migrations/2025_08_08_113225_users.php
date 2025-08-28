<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table ->string('password');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('ext_name')->nullable();
            $table->string('role')->default('user');
            $table->timestamp('last_login')->nullable();
            $table->string('stat')->default('0');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')
            ->references('id')
            ->on('departments')
            ->onDelete('set null');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
