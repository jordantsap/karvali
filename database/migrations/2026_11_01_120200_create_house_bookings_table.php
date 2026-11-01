<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('house_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('listing_type');
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->unsignedSmallInteger('guests')->nullable();
            $table->decimal('offer_price', 12, 2)->nullable();
            $table->text('message')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('house_id')->references('id')->on('houses')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->index(['house_id', 'status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_bookings');
    }
};
