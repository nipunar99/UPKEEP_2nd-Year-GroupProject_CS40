<?php 

class Moderatoritemtemplate 
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "name",
        "status",
        "type",
        "description",
        "category",
        "date",
    ];

    

}
