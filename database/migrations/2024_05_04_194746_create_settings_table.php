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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('phone', 150);
            $table->string('logo', 255)->nullable;
            $table->tinyInteger('state', 1)->default(1);
            $table->tinyInteger('hour', 2);
            $table->float('start');
            $table->float('end');
            $table->tinyInteger('after_count_time', 2)->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
