<?php
class importNotes extends Controller{
    public function importNotes() {
        if (!empty($_FILES) && isset($_POST['import_notes'])) {
            if ($_FILES['excel']['error'] === UPLOAD_ERR_OK) {
                $file_type = $_FILES['excel']['type'];
                if ($file_type !== 'text/csv' && $file_type !== 'application/csv' && $file_type !== 'application/vnd.ms-excel') {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format CSV !!';
                } else {
                    $csv_file = $_FILES['excel']['tmp_name'];
                    $db = new Database();
                    $fichier = fopen($csv_file, 'r');
                    if ($fichier !== false) {
                        fgetcsv($fichier); // Skip the header row
                        try {
                            while (($row = fgetcsv($fichier)) !== false) {
                                if (count($row) < 5) {
                                    echo "Ligne CSV invalide: " . implode(", ", $row) . " (Number of columns: " . count($row) . ")<br/>";
                                    continue;
                                }

                                $IdUtilisateur = $row[0];
                                $IdCours = $row[1];
                                $TypeNote = $row[2];
                                $Valeur = $row[3];
                                $Coefficient = $row[4];

                                // Insert the row into the notes table
                                $result = $db->query(
                                    "INSERT INTO notes (IdUtilisateur, IdCours, TypeNote, Valeur, Coefficient) VALUES (?, ?, ?, ?, ?)", 
                                    [$IdUtilisateur, $IdCours, $TypeNote, $Valeur, $Coefficient]
                                );                                
                            }
                            fclose($fichier);
                            $this->view('ImportNotes');
                            echo '<script>alert("Importation des notes avec succès.");</script>';
                        } catch (PDOException $e) {
                            echo '<script>alert("Importation des notes avec succès.");</script>' . $e->getMessage();
                        }
                    } else {
                        echo "Erreur dans l'ouverture du fichier";
                    }
                }
            } else {
                echo 'Erreur lors du téléchargement du fichier.';
            }
        }
    }

    public function index() {
        $this->view('ImportNotes');
    }
}
?>
