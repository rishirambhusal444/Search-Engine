<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('u_id');

            $table->string('email');
            $table->double('lat');
            $table->double('lng');
            
    
            $table->double('c_lat')->nullable();
            $table->double('c_lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geos');
    }
}
