<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('fb')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('insta')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('tw')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('tlg')->nullable();
            $table->string('tlg_link')->nullable();
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
        Schema::dropIfExists('socials');
    }
}
