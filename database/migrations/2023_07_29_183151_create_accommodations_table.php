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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();

            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
//            $table->json('uploads')->nullable();
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->unsignedInteger('total_rooms')->default(0);
            //$table->string('address');
            // $table->float('lat', 10, 6);
            // $table->float('lng', 10, 6);
            $table->boolean('active')->default(0)->nullable();

            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\AccommodationType::class);

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
        Schema::dropIfExists('accommodations');
    }
};
