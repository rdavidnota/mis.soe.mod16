<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysProductLineGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_line_goals', function (Blueprint $table) {
            $table->foreign('product_line_id')->references('id')->on('product_lines');
            $table->foreign('goal_id')->references('id')->on('goals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_line_goals', function (Blueprint $table) {
            $table->dropForeign(['product_line_id']);
            $table->dropForeign(['goal_id']);
        });
    }
}
