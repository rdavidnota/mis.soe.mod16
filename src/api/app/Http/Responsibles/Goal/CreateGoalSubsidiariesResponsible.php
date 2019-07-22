<?php


namespace App\Http\Responsibles\Goal;


use App\Data\GoalData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class CreateGoalSubsidiariesResponsible implements Responsable
{

    use BaseResponsible;

    protected $Name;
    protected $Description;
    protected $Mount;
    protected $TypeGoal;
    protected $Subsidiaries;


    public function __construct($name, $description, $mount, $typeGoal, $subsidiaries)
    {
        $this->Name = $name;
        $this->Description = $description;
        $this->Mount = $mount;
        $this->TypeGoal = $typeGoal;
        $this->Subsidiaries = $subsidiaries;
    }

    public function toResponse($request)
    {
        $goalData = new GoalData();
        $result = $goalData->saveGoalSubsidiary($this->Name, $this->Description, $this->Mount, $this->TypeGoal, $this->Subsidiaries);

        return $this->ReturnJson(0, 'ok', $result);
    }
}


