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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Company::class);
            $table->unsignedTinyInteger('day_of_week'); // 1 (Monday) to 7 (Sunday)
            $table->enum('sessions',['Morning','Noon','Afternoon']);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->bigInteger('scheduleable_id');
            $table->string('scheduleable_type');
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
        Schema::dropIfExists('schedules');
    }
};
