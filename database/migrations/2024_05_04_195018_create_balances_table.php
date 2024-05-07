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
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('amount');
            $table->string('type');
            // $table->date('date')->default($table->timestamps());
            $table->foreignId('empid')->constrained('employee', 'id');
            $table->tinyInteger('state', 1)->default(0);
            $table->timestamp('date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
