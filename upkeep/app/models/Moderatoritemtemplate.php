<?php 

class Moderatoritemtemplate 
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "name",
        "type",
        "description",
        "category",
        "date",
    ];

    

}
