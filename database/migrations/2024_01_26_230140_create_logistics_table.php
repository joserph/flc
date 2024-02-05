<?php

use App\Models\User;
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
        Schema::create('logistics', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('ruc');
            $table->string('phone');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->unsignedBigInteger('user_update');
            $table->string('image_url')->nullable();
            $table->softDeletes();

            $table->foreignIdFor(User::class)->constrained();
            $table->foreign('user_update')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics');
    }
};
