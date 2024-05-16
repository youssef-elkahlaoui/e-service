<?php

class ImportUsers extends Controller {
    public function import() {
        if (!empty($_FILES) && isset($_POST['import'])) {
            
            if ($_FILES['excel']['error'] === UPLOAD_ERR_OK) {
                
                $file_type = $_FILES['excel']['type'];
                if ($file_type !== 'text/csv' && $file_type !== 'application/csv' && $file_type !== 'application/vnd.ms-excel') {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format CSV !!';
                } else {
                    $csv_file = $_FILES['excel']['tmp_name'];
                    $db = new Database();
                    $fichier = fopen($csv_file, 'r');
                    fgetcsv($fichier); // Skip the header row

                    if ($fichier !== false) {
                        try {
                           
                            $result = $db->query("SELECT MAX(id) AS max_id FROM students");
                            if ($result !== false) {
                                $next_id = intval($result[0]->max_id) + 1;

                                
                                while (($row = fgetcsv($fichier)) !== false) {
                                    
                                    $row[0] = $next_id++;
                                    $row[4] = password_hash($row[4], PASSWORD_DEFAULT);
                                    $db->query("INSERT INTO students (id, firstname, lastname, email, Filiere, idClasse, password, CNE, CIN) VALUES (?, ?, ?, ?, NOW(), 1, ?, ?, ?)", $row);
                                }
                                fclose($fichier);
                                $db = null;
                                echo 'Importation des données avec succès';
                            } else {
                                echo "Erreur lors de l'exécution de la requête SQL";
                            }
                        } catch (PDOException $e) {
                            echo "Erreur d'insertion dans la base de données: " . $e->getMessage();
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
        $this->view('ImportUsers');
    }
}

?>
