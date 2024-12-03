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
        Schema::create('contactmts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id')->nullable();
            $table->string('seen')->nullable();
            $table->string('img')->nullable();
            $table->string('message')->nullable();
            $table->string('datecontact')->nullable();
            $table->string('timecontact')->nullable();
            $table->string('adminreplay')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactmts');
    }
};
