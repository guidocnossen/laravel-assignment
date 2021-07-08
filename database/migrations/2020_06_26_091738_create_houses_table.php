<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->string('name')->nullable(); 
            $table->string('type')->nullable();
            $table->string('surface')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('price')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
            $table->dateTime('deleted_at')->nullable(); 

            // foreign keys
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
