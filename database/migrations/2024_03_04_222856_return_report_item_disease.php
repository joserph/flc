<?php

use App\Models\Disease;
use App\Models\ReturnReportItem;
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
        Schema::create('return_report_item_diseases', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(ReturnReportItem::class);
            $table->foreignIdFor(Disease::class);
            $table->string('percentage')->default('0')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_report_item_diseases');
    }
};
