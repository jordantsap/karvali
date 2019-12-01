<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Schema::disableForeignKeyConstraints();
DB::statement('SET FOREIGN_KEY_CHECKS=0;');

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('start_date');
            $table->string('start_time');
            $table->string('end_date');
            $table->string('end_time');
            $table->string('entrance');
            $table->string('telephone');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            //$table->string('address');
            // $table->float('lat', 10, 6);
            // $table->float('lng', 10, 6);
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('id');
            // $table->integer('group_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
