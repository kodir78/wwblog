<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('album_id')->unsigned()->nullable();
            $table->string('title');
            $table->string("slug")->unique();
            $table->text('description');
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->bigInteger("hits");
            $table->bigInteger("created_by");
            $table->bigInteger("updated_by")->nullable();
            $table->bigInteger("deleted_by")->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('album_id')->references('id')->on('albums');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeries');
    }
}
