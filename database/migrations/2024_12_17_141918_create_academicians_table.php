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
        Schema::create('academicians', function (Blueprint $table) {
            $table->id();
            $table->string('name')->varchar(100);
            $table->string('staff_number')->varchar(50);
            $table->string('email')->unique()->varchar(255);
            $table->string('collage')->varchar(100);
            $table->string('department');
            $table->string('position');//
            $table->string('role')->default('member');//
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicians');
    }
};
