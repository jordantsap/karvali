<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('sku');
            $table->double('price', 8, 2);
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
          $table->integer('company_id')->unsigned()->nullable()->after('id');
          $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
          $table->integer('user_id')->unsigned()->after('company_id');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('product_type')->unsigned()->nullable()->after('company_id');
          $table->foreign('product_type')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
