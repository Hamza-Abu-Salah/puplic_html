<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('file_path');
            $table->string('name');
            $table->string('major');
            $table->string('majordesc');
            $table->string('company');
            $table->string('email');
            $table->string('number');
            $table->string('privacy');
            $table->string('privacy2');
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
        Schema::dropIfExists('about_u_s');
    }
}
