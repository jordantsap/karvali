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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->date('check_in_date');
            $table->date('check_out_date');
//            $table->time('check_in_time');
//            $table->time('check_out_time');
            $table->string('status');
            $table->bigInteger('adults');
            $table->bigInteger('children')->nullable();
            $table->foreignIdFor(\App\Models\Room::class);
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
        Schema::dropIfExists('bookings');
    }
};
