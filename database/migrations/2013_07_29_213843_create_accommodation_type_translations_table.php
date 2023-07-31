<?php

use App\Models\AccommodationType;
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
        Schema::create('accommodation_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AccommodationType::class);
            $table->string('locale')->index();

            // The actual fields to store the content of your entity. You can add whatever you need.
            $table->string('title');
            $table->string('slug')->unique();
//            $table->string('meta_description')->nullable();
//            $table->string('meta_keywords')->nullable();

            $table->unique(['accommodation_type_id', 'locale'], 'locale_unique');
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
        Schema::dropIfExists('accommodation_type_translations');
    }
};
