<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $value='esdjs';
            $table->string('email');
            $table->string('Type');

            $table->string('Bname');
            $table->string('District');
            
            $table->string('LocalLevel');
            $table->integer('Ward');
            $table->bigInteger('Phone');
            $table->string('Tole');
            $table->string('Services');
            $table->string('PP')->default('avatar.jpg');
            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
