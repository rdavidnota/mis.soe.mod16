<?php


namespace App\Http\Responsibles\Subsidiaries;


use App\Data\SubsidiaryData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class GetGoalSubsidiaryResponsible implements Responsable
{
    use BaseResponsible;
    protected $Id;

    public function __construct(int $id)
    {
        $this->Id = $id;
    }

    public function toResponse($request)
    {
        $subsidiaryData = new SubsidiaryData();
        $result = $subsidiaryData->getGoalSubsidiary($this->Id);

        return $this->ReturnJson(0, 'ok', $result);
    }
}
