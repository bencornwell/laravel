<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('abbreviation');
            $table->integer('organisation_type_id' );
            $table->integer('country_id' );
            $table->string('url');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('fax');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('address_city');
            $table->string('address_province' );
            $table->string('address_postcode' );
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
        Schema::dropIfExists('organisations');
    }
}
