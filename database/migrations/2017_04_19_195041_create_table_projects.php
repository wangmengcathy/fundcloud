<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('pid');
            $table->integer('user_id')->unsigned();
            $table->string('pname');
            $table->text('desp');
            $table->float('minmoney',10,2);
            $table->float('maxmoney',10,2);
            $table->datetime('endtime');
            $table->datetime('release_time');
            $table->string('tag');
            $table->float('raisedmoney',10,2);
            
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
