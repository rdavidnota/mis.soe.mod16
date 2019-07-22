<?php


namespace App\Http\Controllers;


use App\Http\Responsibles\Subsidiaries\GetGoalSubsidiaryResponsible;
use App\Http\Responsibles\Subsidiaries\SetGoalSubsidiariesResponsible;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{

    public function setGoalSubsidiaries(Request $request)
    {
        $goal = $request->get('goal');
        return new SetGoalSubsidiariesResponsible($goal);
    }

    public function getGoalSubsidiary(Request $request){
        $id = $request->get('id');
        return new GetGoalSubsidiaryResponsible($id);
    }
}
