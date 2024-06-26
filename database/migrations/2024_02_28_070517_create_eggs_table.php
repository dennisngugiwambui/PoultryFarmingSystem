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
        Schema::create('eggs', function (Blueprint $table) {
            $table->id();
            $table->string('farmerName');
            $table->integer('farmerPhone');
            $table->string('date');
            $table->integer('eggs_number');
            $table->text('comments');
            $table->string('status')->default('entered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eggs');
    }
};
