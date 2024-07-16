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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_date');
            $table->string('unit');
            $table->string('cat');
            $table->string('qty');
            $table->string('issue_qty');
            $table->string('funded_by');
            $table->string('price');
            $table->bigInteger('item_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('fund_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
