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
