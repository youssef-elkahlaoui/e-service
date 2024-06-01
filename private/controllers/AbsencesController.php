<?php
class AbsencesController extends Controller {
    public function import() {
        if (!empty($_FILES) && isset($_POST['import_absences'])) {
            if ($_FILES['csv']['error'] === UPLOAD_ERR_OK) {
                $file_type = $_FILES['csv']['type'];
                $allowed_types = ['text/csv', 'application/csv', 'application/vnd.ms-excel'];

                if (!in_array($file_type, $allowed_types)) {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format CSV !!';
                } else {
                    $csv_file = $_FILES['csv']['tmp_name'];
                    $db = new Database();
                    $fichier = fopen($csv_file, 'r');

                    if ($fichier !== false) {
                        fgetcsv($fichier); 
                        try {
                            while (($row = fgetcsv($fichier)) !== false) {
                                if (count($row) < 2) {
                                    echo "Ligne CSV invalide: " . implode(", ", $row) . " (Number of columns: " . count($row) . ")<br/>";
                                    continue;
                                }
                                
                                $idstudent = $row[0];
                                $justifiee = isset($row[1]) ? $row[1] : 'non';
                                $result = $db->query(
                                    "INSERT INTO absences (IdStudent, IdCours, Justifiée) VALUES (?, ?, ?) 
                                    ON DUPLICATE KEY UPDATE , Justifiée=VALUES(Justifiée)",
                                    [$idstudent, $_POST['module'], $justifiee]
                                );                                
                            }
                            fclose($fichier);
                            echo '<div class="card mb-4">
                                <div class="card-body shadow rounded-3">
                                    <div class="alert alert-success" role="alert">
                                        Importation des absences avec succès.
                                    </div>
                                </div>
                            </div>';
                            $this->view('absence.prof');
                        } catch (PDOException $e) {
                            echo '<div class="card mb-4">
                                <div class="card-body shadow rounded-3">
                                    <div class="alert alert-danger" role="alert">
                                        Problème d\'insertion des données.
                                    </div>
                                </div>
                            </div>' . $e->getMessage();
                        }
                    } else {
                        echo '<div class="card mb-4">
                            <div class="card-body shadow rounded-3">
                                <div class="alert alert-danger" role="alert">
                                    Erreur dans l\'ouverture du fichier
                                </div>
                            </div>
                        </div>';
                    }
                }
            } else {
                echo '<div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="alert alert-danger" role="alert">
                            Erreur lors du téléchargement du fichier                                        
                        </div>
                    </div>
                </div>';
            }
        }
    }

    public function index() {
        $this->view('absence.prof');
    }
}
?>
