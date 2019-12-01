<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {

         Schema::create('companies', function (Blueprint $table) {
             $table->increments('id');
             // $table->string('title');
             // $table->string('slug');
             // $table->string('meta_description');
             // $table->string('meta_keywords');
             $table->string('delivery');
             // $table->string('manager');
             $table->string('header')->nullable();
             $table->string('logo')->nullable();
             $table->string('image1')->nullable();
             $table->string('image2')->nullable();
             $table->string('image3')->nullable();
             $table->string('days');
             $table->string('morningtime');
             $table->string('afternoontime');
             $table->string('telephone')->nullable();
             $table->string('website')->nullable();
             $table->string('email')->nullable();
             $table->string('facebook')->nullable();
             $table->string('twitter')->nullable();
             // $table->string('address');
             $table->string('pos');
             $table->string('creditcard')->nullable();
             // $table->longText('description');
             $table->boolean('active')->default(0)->nullable();
             $table->timestamps();
         });
         Schema::table('companies', function (Blueprint $table) {
             $table->integer('user_id')->unsigned()->after('id');
             $table->integer('company_type')->unsigned()->nullable()->after('user_id');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('company_type')->references('id')->on('company_types');
         });

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
