<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureGoalStatusProductLine extends Migration
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
CREATE PROCEDURE GoalStatusByProductLine(
	sellerId INTEGER
)
BEGIN
    select goal.id, goal.name, goal.description,goal.mount, sum(sale.total) as current
    from sellers as seller,
                sales as sale,
                products as product,
                product_lines as product_line,
                product_line_goals as product_line_goal,
                goals as goal,
                bonuses as bonus
    where       sellerId = seller.id
                and seller.id = sale.seller_id 
                and product.id = sale.product_id
                and product_line.id = product.product_line_id
                and product_line.id = product_line_goal.product_line_id
                and goal.id = product_line_goal.goal_id
                and bonus.goal_id = goal.id
                and bonus.initial_date <= sale.sale_date
                and bonus.expiration_date >= sale.sale_date
    GROUP BY goal.id;
END;";

        $this->deleteQuery = "DROP PROCEDURE GoalStatusByProductLine;";
    }
}
