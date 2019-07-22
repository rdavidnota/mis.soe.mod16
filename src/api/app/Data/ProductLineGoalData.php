<?php


namespace App\Data;


use App\Entities\SubsidiaryGoalEntity;
use App\Models\ProductLineGoal;
use App\Models\SubsidiaryGoal;

class ProductLineGoalData
{
    public function get($id)
    {
        $subsidiaryGoalsModel = ProductLineGoal::whereProductLineId($id)
            ->get();
        $result = [];

        foreach ($subsidiaryGoalsModel as $subsidiaryGoalModel) {
            array_push($result, $this->_ModelToEntity($subsidiaryGoalModel, true));
        }

        return $result;
    }

    protected function _ModelToEntity($subsidiaryModel, $complete = false)
    {
        $subsidiaryGoalEntity = new SubsidiaryGoalEntity();
        $subsidiaryGoalEntity->Id = $subsidiaryModel->id;
        $subsidiaryGoalEntity->SubsidiaryId = $subsidiaryModel->subsidiary_id;
        $subsidiaryGoalEntity->GoalId = $subsidiaryModel->goal_id;

        if($complete){
            $goalData = new GoalData();
            $subsidiaryGoalEntity->Goal = $goalData->get($subsidiaryGoalEntity->GoalId);
        }
        return $subsidiaryGoalEntity;
    }
}
