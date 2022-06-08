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
              $table->string('shop_name')->nullable();
              $table->string('description')->nullable();
              $table->string('phone')->nullable();
              $table->string('address')->nullable();
              $table->string('city')->nullable();
              $table->string('ntn_no')->nullable();
              $table->string('cnic_no')->nullable();
               $table->string('document')->nullable();
               $table->integer('status')->default('0');
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
