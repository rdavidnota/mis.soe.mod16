<?php


namespace App\Data;


use App\Entities\ProductLineEntity;
use App\Models\ProductLine;

class ProductLineData
{
    public function get($id)
    {
        $producLineModel = ProductLine::whereId($id)
            ->first();
        $result = $this->_ModelToEntity($producLineModel, true);
        return $result;
    }

    public function _ModelToEntity($productLineModel, $complete = false)
    {
        $productLine = new ProductLineEntity();

        $productLine->Id = $productLineModel->id;
        $productLine->Name = $productLineModel->name;
        $productLine->Description = $productLineModel->description;

        if($complete){
            $productLineGoalData =new ProductLineGoalData();
            $productLine->ProductLineGoals =  $productLineGoalData->get($productLine->Id);
        }

        return $productLine;
    }
}
