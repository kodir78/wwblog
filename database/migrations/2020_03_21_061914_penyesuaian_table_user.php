<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug')->unique();
            $table->string("user_login")->nullable();
            $table->text("url")->nullable();
            $table->string("phone");
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->text("bio")->nullable();
            $table->string("avatar")->nullable();
            $table->string("display_name")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("user_login");
            $table->dropColumn("user_roles");
            $table->dropColumn("user_url");
            $table->dropColumn("user_phone");
            $table->dropColumn("status", ["ACTIVE", "INACTIVE"]);
            $table->dropColumn("user_bio");
            $table->dropColumn("avatar");
            $table->dropColumn("display_name");
            });
    }
}
