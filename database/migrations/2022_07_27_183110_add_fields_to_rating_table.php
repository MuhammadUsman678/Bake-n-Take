<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('product_id');
            $table->bigInteger('order_id');
            $table->text('comment');
            $table->integer('status');
            $table->dropForeign(['shop_id']);
            $table->dropColumn(['shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropColumn(['user_id','product_id','order_id','comment','status']);
        });
    }
}
