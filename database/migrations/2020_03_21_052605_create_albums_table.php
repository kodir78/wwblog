<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string("slug")->unique();
            $table->text('description');
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->string('cover');
            $table->bigInteger("hits");
            $table->bigInteger("created_by");
            $table->bigInteger("updated_by")->nullable();
            $table->bigInteger("deleted_by")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('albums');
    }
}
