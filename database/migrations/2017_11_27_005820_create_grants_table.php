<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->increments('id');
            $table->text( 'project_title' );
            $table->integer( 'status_id' );
            $table->text( 'project_description' );
            $table->integer( 'funding_round_id' );
            $table->string( 'funding_agency_reference' );
            $table->date('application_date');
            $table->date('planned_start_date')->nullable( );
            $table->date('planned_end_date' )->nullable( );
            $table->date('transferred_in_date' )->nullable( );
            $table->integer('transferred_in_organisation' )->nullable( );
            $table->date('transferred_out_date' )->nullable( );
            $table->integer('transferred_out_organisation' )->nullable( );
            $table->integer( 'user_id' );
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
        Schema::dropIfExists('grants');
    }
}
