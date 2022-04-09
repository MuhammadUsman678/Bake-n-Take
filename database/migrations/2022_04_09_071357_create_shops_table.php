<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
              $table->foreignId('user_id')->constrained();
              $table->string('shop_name');
              $table->string('description');
              $table->integer('phone');
              $table->string('address');
              $table->string('city');
              $table->integer('ntn_no');
              $table->integer('cnic_no');
               $table->string('document');
               $table->integer('status')->default('1');
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
        Schema::dropIfExists('shops');
    }
}
