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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('tradename')->nullable();
            $table->string('ruc');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('email');
            $table->string('agroquality_code')->nullable();
            $table->string('status'); // Active, Suspended, Closed
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
