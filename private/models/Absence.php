<?php

/**
 * Admin Model
 */
class Absence extends Model
{
    protected $allowedColumns = [
    

        'IdAbsence',	
        'IdStudent',
        'IdCours',
        'DateAbsence',	
        'Justifiée'
    ];
}
