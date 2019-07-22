<?php


namespace App\Data;


use App\Models\Sale;

class SellerData
{
    public function GoalStatus($sellerId){
        $sales = Sale::query()
            ->where('seller_id', $sellerId);

        $productsLine = [];


    }
}
