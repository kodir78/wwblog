<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string('email')->unique();
            $table->string('url')->unique();
            $table->string('facebook')->unique()->nullable();
            $table->string('isntagram')->unique()->nullable();
            $table->string('twitter')->unique()->nullable();
            $table->text('maps')->unique()->nullable();
            $table->string("image")->comment("berisi image logo");
            $table->string("favicon")->comment("berisi image favicon");
            $table->integer("created_by");
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('options');
    }
}
