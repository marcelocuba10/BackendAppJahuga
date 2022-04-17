<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('price',8,3);
            $table->string('image');
            $table->string('status')->nullable();
            $table->string('company_id')->unsigned();
            $table->timestamps();

            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')
                   ->references('id')
                   ->on('companies')
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
        Schema::dropIfExists('grounds');
    }
}
