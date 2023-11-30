<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('morning_opening_time')->nullable();
            $table->time('morning_closing_time')->nullable();
            $table->time('afternoon_opening_time')->nullable();
            $table->time('afternoon_closing_time')->nullable();
            $table->time('evening_opening_time')->nullable();
            $table->time('evening_closing_time')->nullable();
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_shifts');
    }
};
