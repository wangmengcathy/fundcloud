<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user',function(Blueprint $table){
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('project_pid')->unsigned()->index();
            $table->foreign('project_pid')->references('pid')->on('projects')->onDelete('cascade');
            $table->timestamps();
            $table->float('amount',10,2);
            $table->string('transaction_status');
            
            $table->primary(array('user_id', 'project_id','created_at'));
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pledge');
    }
}
