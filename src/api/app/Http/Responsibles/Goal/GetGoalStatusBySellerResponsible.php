<?php


namespace App\Http\Responsibles\Goal;


use App\Data\GoalData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class GetGoalStatusBySellerResponsible implements Responsable
{

    use BaseResponsible;

    protected $SellerId;

    public function __construct($sellerId)
    {
        $this->SellerId = $sellerId;
    }

    public function toResponse($request)
    {
        $goalData = new GoalData();
        $result = $goalData->goalStatusBySeller($this->SellerId);

        return $this->ReturnJson(0, 'ok', $result);
    }
}


