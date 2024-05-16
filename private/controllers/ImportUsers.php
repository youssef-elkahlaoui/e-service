<?php

class ImportUsers extends Controller{
    public function import(){
        if (!empty($_FILES) && isset($_POST['import'])) {
            // Check if a file has been uploaded
            if ($_FILES['excel']['error'] === UPLOAD_ERR_OK){
                // Check the MIME type of the file
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
                            
                            while (($row = fgetcsv($fichier)) !== false) {
                                $stmt = $db->query("INSERT INTO data (Nom, Prenom, Email) VALUES (?, ?, ?)",array($row[0],$row[1],$row[2]));
                            }
                            fclose($fichier);
                            $db = null;
                            echo 'Importation des données avec succès';
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