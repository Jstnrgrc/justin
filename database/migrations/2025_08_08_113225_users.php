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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50);
            $table->string('ext_name',50);

            //superadmin, admin, manager, supervisor, user
            $table->string('role', 30)->default('user');
            $table->timestamps();
            //1-active 0-inactive
            $table->string('status',2)->default('0');
            $table->unsignedBigInteger('department_id')->nullable();

            $table->foreign('department_id')
             ->references('id')
             ->on('departments')
             ->onDelete('set null');

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
