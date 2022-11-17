<?php 

class Owneritem {

    use Model;

    protected $table ="items";

    protected $allowedColumns = [
        "item_name",
        "item_type",
        "brand",
        "model",
        "purchase_price",
        "description",
        "purchase_date",
        "warrenty_date",
    ];


}