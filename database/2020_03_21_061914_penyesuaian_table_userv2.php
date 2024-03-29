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
            $table->string('first_name');
            $table->string('last_name');
            $table->string("user_nicename")->unique()->nullable();
            $table->boolean("user_roles")->default(0);
            $table->text("user_url")->nullable();
            $table->string("user_phone");
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->text("user_bio")->nullable();
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
            $table->dropColumn("username");
            $table->dropColumn('id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn("user_login");
            $table->dropColumn("user_nicename");
            $table->dropColumn('user_email');
            $table->dropColumn("user_roles");
            $table->dropColumn('user_password');
            $table->dropColumn("user_url");
            $table->dropColumn("user_phone");
            $table->dropColumn("status", ["ACTIVE", "INACTIVE"]);
            $table->dropColumn("user_bio");
            $table->dropColumn("avatar");
            $table->dropColumn("display_name");
            });
    }
}
