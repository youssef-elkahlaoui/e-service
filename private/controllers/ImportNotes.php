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
                                $idstudent = $row[0];
                                $IdCours = $row[1];
                                $TypeNote = $row[2];
                                $Valeur = $row[3];
                                $Coefficient = $row[4];
                                $result = $db->query(
                                    "INSERT INTO notes (idstudent, IdCours, TypeNote, Valeur, Coefficient) VALUES (?, ?, ?, ?, ?)", 
                                    [$idstudent, $IdCours, $TypeNote, $Valeur, $Coefficient]
                                );                                
                            }
                            fclose($fichier);
                                echo '<div class="card mb-4">
                                    <div class="card-body shadow rounded-3">
                                        <div class="alert alert-success" role="alert">
                                    Importation des notes avec succès.
                                    </div>
                                    </div>
                                </div>';
                                $this->view('ImportNotes');

                        } catch (PDOException $e) {
                            echo '<div class="card mb-4">
                                    <div class="card-body shadow rounded-3">
                                        <div class="alert alert-danger" role="alert">
                                    Problem d insertion des donnes.
                                        </div>
                                    </div>
                                </div>'. $e->getMessage();
                        }
                    } else {
                            echo '<div class="card mb-4">
                                    <div class="card-body shadow rounded-3">
                                        <div class="alert alert-danger" role="alert">
                                    Erreur dans l ouverture du fichier
                                        </div>
                                    </div>
                                </div>';
                    }
                }
            } else {
                                                                    echo '<div class="card mb-4">
                                    <div class="card-body shadow rounded-3">
                                        <div class="alert alert-danger" role="alert">
Erreur lors du téléchargement du fichier                                        </div>
                                    </div>
                                </div>';
            }
        }
    }

    public function index() {
        $this->view('ImportNotes');
    }
}
?>
