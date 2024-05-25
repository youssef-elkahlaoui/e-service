<?php

/**
 * Note Model
 */
class Note extends Model
{
    protected $allowedColumns = [
        'idstudent',
        'IdCours',
        'TypeNote',
        'Valeur',
        'Coefficient'
    ];

    protected $beforeInsert = [
        'validate_value',
        'validate_coefficient'
    ];

    public function validate($DATA)
    {
        $this->errors = array();

        // Check for IdUtilisateur
        if (empty($DATA['IdUtilisateur']) || !is_numeric($DATA['IdUtilisateur'])) {
            $this->errors['IdUtilisateur'] = "Invalid user ID";
        }

        // Check for IdCours
        if (empty($DATA['IdCours']) || !is_numeric($DATA['IdCours'])) {
            $this->errors['IdCours'] = "Invalid course ID";
        }

        // Check for TypeNote
        $validTypes = ['Devoir', 'Examen', 'TP', 'Projet'];
        if (empty($DATA['TypeNote']) || !in_array($DATA['TypeNote'], $validTypes)) {
            $this->errors['TypeNote'] = "Invalid type of note";
        }

        // Check for Valeur
        if (isset($DATA['Valeur']) && (!is_numeric($DATA['Valeur']) || $DATA['Valeur'] < 0 || $DATA['Valeur'] > 20)) {
            $this->errors['Valeur'] = "Value must be a number between 0 and 20";
        }

        // Check for Coefficient
        if (isset($DATA['Coefficient']) && (!is_numeric($DATA['Coefficient']) || $DATA['Coefficient'] < 0)) {
            $this->errors['Coefficient'] = "Coefficient must be a non-negative number";
        }

        // No errors, validation is successful
        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function validate_value($data)
    {
        if (isset($data['Valeur']) && (!is_numeric($data['Valeur']) || $data['Valeur'] < 0 || $data['Valeur'] > 20)) {
            $this->errors['Valeur'] = "Value must be a number between 0 and 20";
        }
        return $data;
    }

    public function calculateAllModuleGrades($studentId)
    {
        // Fetch all notes for the given student
        $notes = $this->where('idstudent', $studentId);

        if (empty($notes)) {
            // No notes found
            return [];
        }

        // Group notes by course
        $grades = [];
        foreach ($notes as $note) {
            if (!isset($grades[$note->IdCours])) {
                $grades[$note->IdCours] = [
                    'totalGrade' => 0,
                    'totalCoefficient' => 0,
                ];
            }
            if (isset($note->Valeur) && isset($note->Coefficient)) {
                $grades[$note->IdCours]['totalGrade'] += $note->Valeur * $note->Coefficient;
                $grades[$note->IdCours]['totalCoefficient'] += $note->Coefficient;
            }
        }

        // Fetch module names
        $module = new Module();
        $moduleNames = [];
        foreach (array_keys($grades) as $courseId) {
            $moduleData = $module->where('IdCours', $courseId);
            if (!empty($moduleData)) {
                $moduleNames[$courseId] = $moduleData[0]->Titre;
            } else {
                $moduleNames[$courseId] = 'Unknown';
            }
        }

        // Calculate average grades for each course and include course title
        $averageGrades = [];
        foreach ($grades as $courseId => $gradeData) {
            if ($gradeData['totalCoefficient'] > 0) {
                $averageGrades[] = [
                    'courseId' => $courseId,
                    'courseTitle' => $moduleNames[$courseId],
                    'averageGrade' => $gradeData['totalGrade'] / $gradeData['totalCoefficient'],
                ];
            } else {
                $averageGrades[] = [
                    'courseId' => $courseId,
                    'courseTitle' => $moduleNames[$courseId],
                    'averageGrade' => false, // No valid grades for this course
                ];
            }
        }

        return $averageGrades;
    }
    
}
