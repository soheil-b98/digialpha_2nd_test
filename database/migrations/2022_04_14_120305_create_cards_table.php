<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('card_number',16);
            $table->string('sheba_number',26);
            $table->enum('status',['rejected','accepted','notChecked'])->default('notChecked');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id','card_number']);
            $table->unique(['user_id','sheba_number']);
            $table->unique(['card_number','sheba_number']);

        });

    }


    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
