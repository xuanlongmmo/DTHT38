<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 200)->unique();
            $table->text('featured_img');
            $table->text('description');
            $table->json('image');
            $table->json('document');
            $table->integer('status')->default(1);
            $table->bigInteger('relic_id')->unsigned()->nullable();
            $table->foreign('relic_id')->references('id')->on('relics')->onDelete('cascade');
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
        Schema::dropIfExists('artifacts');
    }
}
