<?php

use App\Models\Client;
use App\Models\Disease;
use App\Models\Farm;
use App\Models\ReturnReport;
use App\Models\Variety;
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
        Schema::create('return_report_items', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(ReturnReport::class)->constrained();
            $table->foreignIdFor(Farm::class)->constrained();
            $table->foreignIdFor(Variety::class)->constrained();
            $table->string('packing');
            $table->foreignIdFor(Disease::class)->constrained();
            $table->integer('piece');
            $table->string('type_piece');
            $table->foreignIdFor(Client::class)->constrained();
            $table->text('observations');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_report_items');
    }
};