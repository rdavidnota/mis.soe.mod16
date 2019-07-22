<?php


namespace App\Http\Controllers;


use App\Http\Responsibles\Goal\CreateGoalProductLineResponsible;
use App\Http\Responsibles\Goal\CreateGoalSubsidiariesResponsible;
use App\Http\Responsibles\Goal\GetGoalStatusBySellerAndProductLineResponsible;
use App\Http\Responsibles\Goal\GetGoalStatusBySellerAndSubsidiaryResponsible;
use App\Http\Responsibles\Goal\GetGoalStatusBySellerResponsible;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function createGoalSubsidiaries(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $mount = $request->get('mount');
        $typeGoal = $request->get('type_goal');
        $subsidiaries = json_decode($request->get('subsidiaries'));

        return new CreateGoalSubsidiariesResponsible($name, $description, $mount, $typeGoal, $subsidiaries);
    }

    public function createGoalProductLine(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $mount = $request->get('mount');

        $productLine = json_decode($request->get('product_line'));

        return new CreateGoalProductLineResponsible($name, $description, $mount, $productLine);
    }

    public function getGoalStatusBySellerAndProductLine(Request $request)
    {
        $sellerId = $request->get('seller_id');
        return new GetGoalStatusBySellerAndProductLineResponsible($sellerId);
    }

    public function getGoalStatusBySellerAndSubsidiary(Request $request)
    {
        $sellerId = $request->get('seller_id');
        return new GetGoalStatusBySellerAndSubsidiaryResponsible($sellerId);
    }

    public function getGoalStatusBySeller(Request $request)
    {
        $sellerId = $request->get('seller_id');
        return new GetGoalStatusBySellerResponsible($sellerId);
    }
}
