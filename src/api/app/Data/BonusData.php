<?php


namespace App\Data;


use App\Entities\BonusEntity;
use App\Models\Bonus;

class BonusData
{
    public function getByGoalId($id)
    {
        $bonusModel = Bonus::whereGoalId($id)
            ->first();
        $result = $this->_ModelToEntity($bonusModel);

        return $result;
    }

    protected function _ModelToEntity($bonusModel, $complete = false)
    {
        $bonusEntity = new BonusEntity();

        $bonusEntity->Id = $bonusModel->id;
        $bonusEntity->Prize = $bonusModel->prize;
        $bonusEntity->InitialDate = $bonusModel->initial_date;
        $bonusEntity->ExpirationDate = $bonusModel->expiration_date;

        return $bonusEntity;
    }
}
