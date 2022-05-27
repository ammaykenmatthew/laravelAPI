<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_servs', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('eMail');
            $table->bigInteger('cpNumber');
            $table->string('details')->nullable();
            $table->bigInteger('receiver_id')->nullable();
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
        Schema::dropIfExists('request_servs');
    }
}
