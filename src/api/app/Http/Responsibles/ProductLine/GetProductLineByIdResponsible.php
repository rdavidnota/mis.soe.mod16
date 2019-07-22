<?php


namespace App\Http\Responsibles\ProductLine;


use App\Data\ProductLineData;
use App\Http\Responsibles\BaseResponsible;
use Illuminate\Contracts\Support\Responsable;

class GetProductLineByIdResponsible implements Responsable
{
    use BaseResponsible;
    protected $Id;

    public function __construct($id)
    {
        $this->Id = $id;
    }

    public function toResponse($request)
    {
        $productLineData = new ProductLineData();

        $productLine = $productLineData->get($this->Id);
        return $this->ReturnJson(0, 'ok', $productLine);
    }
}
