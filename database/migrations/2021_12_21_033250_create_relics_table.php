<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 200);
            $table->text('featured_img');
            // $table->bigInteger('province_id')->unsigned();
            // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            // $table->bigInteger('district_id')->unsigned();
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            // $table->bigInteger('ward_id')->unsigned();
            // $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->string('address', 200);
            $table->text('description');
            $table->text('content');
            $table->json('image')->nullable();
            $table->json('document')->nullable();
            $table->json('tag')->nullable();
            $table->json('category');
            $table->json('rate');
            $table->integer('status')->default(1);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('relics');
    }
}
