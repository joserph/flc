<?php

use App\Models\Client;
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
        Schema::create('return_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Client::class)->constrained();
            $table->date('date');
            $table->foreignIdFor(Logistic::class)->constrained();
            $table->string('guide_type');
            $table->string('guide_number');
            $table->string('destination');
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_reports');
    }
};
