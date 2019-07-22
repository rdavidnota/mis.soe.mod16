<?php


namespace App\Http\Responsibles;


use App\Entities\Result;

trait BaseResponsible
{
    protected function ReturnJson($code, $message = '', $object = null)
    {
        $result = new Result();

        $result->Code = $code;
        $result->Message = $message;

        if (!is_null($object)) {
            $result->Json = $object;
        }

        return response()->json($result);
    }
}
