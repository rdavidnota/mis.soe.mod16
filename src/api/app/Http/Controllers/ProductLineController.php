<?php


namespace App\Http\Controllers;


use App\Http\Responsibles\ProductLine\GetProductLineByIdResponsible;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{

    public function get(Request $request)
    {
        $id = $request->get('id');
        return new GetProductLineByIdResponsible($id);
    }
}
