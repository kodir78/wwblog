<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("slug")->unique();
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->string("image")->comment("berisi nama file image saja tanpa path");
            $table->bigInteger("sidebar")->nullable();;
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
        Schema::dropIfExists('categories');
    }
}
