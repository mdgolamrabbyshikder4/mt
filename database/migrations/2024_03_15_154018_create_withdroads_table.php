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
        Schema::create('withdroads', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('sendernumber')->nullable();
            $table->string('amount');
            $table->string('trid')->nullable();
            $table->string('methods');
            $table->integer('status');
            $table->integer('user_id');
            $table->string('dateandtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdroads');
    }
};
