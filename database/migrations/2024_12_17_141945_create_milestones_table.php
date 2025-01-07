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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grant_id');
            $table->foreign('grant_id')->references('id')->on('grants')->onDelete('cascade');
            $table->string('milestone_title')->varchar(100);
            $table->date('completion_date');
            $table->string('deliverable');
            $table->string('status');
            $table->string('remarks');
            $table->date('date_updated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
