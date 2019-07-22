<?php


namespace App\Http\Responsibles\Goal;


use App\Data\GoalData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class CreateGoalProductLineResponsible implements Responsable
{
    use BaseResponsible;

    protected $Name;
    protected $Description;
    protected $Mount;
    protected $ProductLines;


    public function __construct($name, $description, $mount, $productLines)
    {
        $this->Name = $name;
        $this->Description = $description;
        $this->Mount = $mount;
        $this->ProductLines = $productLines;
    }

    public function toResponse($request)
    {
        $goalData = new GoalData();
        $goalData->saveGoalProductLine($this->Name, $this->Description, $this->Mount, $this->ProductLines);

        return $this->ReturnJson(0, 'ok');
    }
}
