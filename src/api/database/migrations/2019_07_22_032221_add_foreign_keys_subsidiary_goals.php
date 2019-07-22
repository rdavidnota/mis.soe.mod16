<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysSubsidiaryGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subsidiary_goals', function (Blueprint $table) {
            $table->foreign('subsidiary_id')->references('id')->on('subsidiaries');
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
        Schema::table('subsidiary_goals', function (Blueprint $table) {
            $table->dropForeign(['subsidiary_id']);
            $table->dropForeign(['goal_id']);
        });
    }
}
