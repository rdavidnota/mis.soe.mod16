<?php


namespace App\Entities;


class SaleEntity
{
    public $Id;
    public $Price;
    public $Quantity;
    public $Total;
    public $SaleDate;
    public $SellerId;
    public $SubsidiaryId;
    public $ProductId;

    public $Seller;
    public $Subsidiary;
    public $Product;
}
