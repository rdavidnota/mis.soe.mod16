<?php


namespace App\Http\Responsibles\Subsidiaries;


use App\Data\SubsidiaryData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class SetGoalSubsidiariesResponsible implements Responsable
{
    use BaseResponsible;
    protected $Goal;

    public function __construct(int $goal)
    {
        $this->Goal = $goal;
    }

    public function toResponse($request)
    {
        $subsidiaryData = new SubsidiaryData();
        $subsidiaryData->setGoalSubsidiaries($this->Goal);

        return $this->ReturnJson(0, 'ok');
    }
}
