<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::table('academicians', function (Blueprint $table) {
            $table->renameColumn('collage', 'college');
        });
    }

    public function down()
    {
        Schema::table('academicians', function (Blueprint $table) {
            $table->renameColumn('college', 'collage');
        });
    }
};
