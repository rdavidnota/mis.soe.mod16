<?php


namespace App\Data;


use App\Entities\SubsidiaryEntity;
use App\Models\Subsidiary;
use App\Models\SubsidiaryGoal;

class SubsidiaryData
{
    public function setGoalSubsidiaries(int $goal)
    {
        $subsidiaries = Subsidiary::get();

        foreach ($subsidiaries as $subsidiary) {
            $subsidiary->goal = $goal * ($subsidiary->percentage_goal / 100);
            $subsidiary->save();
        }
    }

    public function getGoalSubsidiary(int $id)
    {
        $subsidiaryGoals = SubsidiaryGoal::whereSubsidiaryId($id)->get();
        $result = [];
        foreach ($subsidiaryGoals as $subsidiaryGoal) {
            $subsidiary = Subsidiary::whereId($subsidiaryGoal->id)->first();
            $result = $this->_ModelToEntity($subsidiary, true);

        }

        return $result;
    }

    protected function _ModelToEntity($subsidiaryModel, $complete = false)
    {
        $subsidiary = new SubsidiaryEntity();
        $subsidiary->Id = $subsidiaryModel->id;
        $subsidiary->Name = $subsidiaryModel->name;
        $subsidiary->Description = $subsidiaryModel->description;
        $subsidiary->PercentageGoal = $subsidiaryModel->percentage_goal;
        $subsidiary->Goal = $subsidiaryModel->goal;

        if($complete){
            $subsidiaryGoalData = new SubsidiaryGoalData();
            $subsidiary->SubsidiaryGoal = $subsidiaryGoalData->get($subsidiary->Id);
        }

        return $subsidiary;
    }
}
