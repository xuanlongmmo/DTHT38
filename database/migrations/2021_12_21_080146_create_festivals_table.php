<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->bigInteger('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->bigInteger('ward_id')->unsigned()->nullable();
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->date('date');
            $table->text('description');
            $table->json('image');
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
        Schema::dropIfExists('festivals');
    }
}
