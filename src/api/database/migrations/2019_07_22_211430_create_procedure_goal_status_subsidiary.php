<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureGoalStatusSubsidiary extends Migration
{
    private $createQuery;
    private $deleteQuery;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->init();
        DB::unprepared($this->createQuery);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->init();
        DB::unprepared($this->deleteQuery);
    }

    private function init()
    {
        $this->createQuery = "
CREATE PROCEDURE GoalStatusBySubsidiary(
	sellerId INTEGER
)
BEGIN
    select goal.id, goal.name, goal.description,goal.mount, sum(sale.total) as current
    from sellers as seller,
                sales as sale,
                subsidiaries as subsidiary,
                subsidiary_goals as subsidiary_goal,
                goals as goal,
                bonuses as bonus
    where       sellerId = seller.id
                and seller.id = sale.seller_id 
                and subsidiary.id = sale.subsidiary_id
                and subsidiary.id = subsidiary_goal.subsidiary_id
                and goal.id = subsidiary_goal.goal_id
                and bonus.goal_id = goal.id
                and bonus.initial_date <= sale.sale_date
                and bonus.expiration_date >= sale.sale_date
    GROUP BY goal.id;
END;";

        $this->deleteQuery = "DROP PROCEDURE GoalStatusBySubsidiary;";
    }
}
