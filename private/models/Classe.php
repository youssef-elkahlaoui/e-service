<?php

/**
 * Classe Model
 */
class Classe extends Model
{
    public $allowedColumns = [
        'idClasse',
        'NomFiliere',
        'Niveau',
        'AnneeScolaire'
    ];

    public function validate($DATA)
    {
        $this->errors = array();

        // Check for NomFiliere
        if (empty($DATA['NomFiliere']) || !preg_match('/^[a-zA-Z ]+$/', $DATA['NomFiliere'])) {
            $this->errors['NomFiliere'] = "Only letters and spaces are allowed in NomFiliere";
        }

        // Check for Niveau
        if (!empty($DATA['Niveau']) && !preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['Niveau'])) {
            $this->errors['Niveau'] = "Only letters, numbers and spaces are allowed in Niveau";
        }

        // Check for AnnéeScolaire
        if (empty($DATA['AnnéeScolaire']) || !preg_match('/^\d{4}-\d{4}$/', $DATA['AnnéeScolaire'])) {
            $this->errors['AnnéeScolaire'] = "AnnéeScolaire must be in the format YYYY-YYYY";
        }

        // No errors, validation is successful
        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
}
