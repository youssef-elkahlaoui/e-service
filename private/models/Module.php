<?php 

/**
 * Admin Model
 */
class Module extends Model
{
    protected $allowedColumns = [
        "id",
        "titre",
        "description",
        "idTeatcher",
        "idClasse"
    ];

}

?>