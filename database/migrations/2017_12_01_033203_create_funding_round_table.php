<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingRoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer( 'funding_scheme_id' );
            $table->date('start_date')->nullable( );
            $table->date('end_date')->nullable( );
            $table->boolean('acgr');
            $table->string( 'url' )->nullable( );
            $table->string( 'agency_reference' )->nullable( );
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
        Schema::dropIfExists('funding_rounds');
    }
}
