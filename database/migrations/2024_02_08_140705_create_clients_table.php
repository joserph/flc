<?php

use App\Models\Logistic;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            // $table->string('tradename')->nullable();
            // $table->string('ruc');
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('email')->nullable();
            $table->foreignIdFor(Logistic::class)->constrained();
            // $table->string('agroquality_code')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
