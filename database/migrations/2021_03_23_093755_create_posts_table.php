<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('u_id');

            $table->string('Post');

            $table->string('Image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *php composer.phar update

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
