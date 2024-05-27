<?php

/**
 * Cours Model
 */
class Cour extends Model
{
    public $allowedColumns = [
        'IdCours',
        'Titre',
        'Description',
        'IdEnseignant',
        'IdClasse',
        'IdModule',
        'archived'
    ];

}