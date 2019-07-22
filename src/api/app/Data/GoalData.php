<?php


namespace App\Data;


use App\Entities\GoalEntity;
use App\Models\Goal;
use App\Models\ProductLineGoal;
use App\Models\SubsidiaryGoal;
use Illuminate\Support\Facades\DB;

class GoalData
{

    public function saveGoalSubsidiary($name, $description, $mount, $type_goal_id, $subsidiaries)
    {
        $goal = new Goal();
        $goal->name = $name;
        $goal->description = $description;
        $goal->mount = $mount;
        $goal->type_goal_id = $type_goal_id;

        $goal->save();
        foreach ($subsidiaries as $subsidiary) {
            $subsidiary_goal = new SubsidiaryGoal();
            $subsidiary_goal->goal_id = $goal->id;
            $subsidiary_goal->subsidiary_id = $subsidiary;

            $subsidiary_goal->save();
        }

        return $goal;
    }

    public function saveGoalProductLine($name, $description, $mount, $productLines)
    {
        $goal = new Goal();
        $goal->name = $name;
        $goal->description = $description;
        $goal->mount = $mount;
        $goal->type_goal_id = 4;

        $goal->save();
        foreach ($productLines as $productLine) {
            $productLineGoal = new ProductLineGoal();
            $productLineGoal->goal_id = $goal->id;
            $productLineGoal->product_line_id = $$productLine;

            $productLineGoal->save();
        }
    }

    public function get($id)
    {
        $goalModel = Goal::whereId($id)
            ->first();
        $result = $this->_ModelToEntity($goalModel, true);

        return $result;
    }

    protected function _ModelToEntity($goalModel, $complete = false)
    {
        $goalEntity = new GoalEntity();

        $goalEntity->Id = $goalModel->id;
        $goalEntity->Name = $goalModel->name;
        $goalEntity->Description = $goalModel->description;
        $goalEntity->Mount = $goalModel->mount;
        $goalEntity->TypeGoalId = $goalModel->type_goal_id;

        if ($complete) {
            $bonusData = new BonusData();
            $goalEntity->Bonuses = $bonusData->getByGoalId($goalEntity->Id);
        }

        return $goalEntity;
    }

    public function goalStatusBySellerAndSubsidiary($sellerId){
        $params = [
            $sellerId,
        ];
        $goalsModel = DB::select('CALL GoalStatusBySubsidiary(?)', $params);
        $goals = [];
        foreach ($goalsModel as $goalModel) {
            array_push($goals, $this->_ToEntity($goalModel, true));
        }

        return $goals;
    }

    public function goalStatusBySellerAndProductLine($sellerId){
        $params = [
            $sellerId,
        ];
        $goalsModel = DB::select('CALL GoalStatusByProductLine(?)', $params);
        $goals = [];
        foreach ($goalsModel as $goalModel) {
            array_push($goals, $this->_ToEntity($goalModel, true));
        }

        return $goals;
    }

    public function goalStatusBySeller($sellerId){
        $results = [];
        $goalSubsidiary = $this->goalStatusBySellerAndSubsidiary($sellerId);
        $goalProductLine = $this->goalStatusBySellerAndProductLine($sellerId);

        array_push($results, $goalSubsidiary);
        array_push($results, $goalProductLine);
        return $results;
    }

    protected function _ToEntity($goalModel, $complete = false)
    {
        $goalEntity = new GoalEntity();

        $goalEntity->Id = $goalModel->id;
        $goalEntity->Name = $goalModel->name;
        $goalEntity->Description = $goalModel->description;
        $goalEntity->Mount = $goalModel->mount;
        $goalEntity->Current = $goalModel->current;

        if ($complete) {
            $bonusData = new BonusData();
            $goalEntity->Bonuses = $bonusData->getByGoalId($goalEntity->Id);
        }

        return $goalEntity;
    }

}
