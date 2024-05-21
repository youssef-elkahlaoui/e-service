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
                    if ($fichier !== false) {
                        try {
                            // Determine the highest existing ID in the students table
                            $result = $db->query("SELECT MAX(id) AS max_id FROM students");
                            $next_id = intval($result[0]->max_id) + 1;

                            while (($row = fgetcsv($fichier)) !== false) {

                                // Validate row
                                if (count($row) !== 8) {
                                    echo "Ligne CSV invalide: " . implode(", ", $row) . " (Nombre de colonnes: " . count($row) . ")<br/>";
                                    continue;
                                }

                                $id = $next_id++;
                                $firstname = $row[0];  
                                $lastname = $row[1];   
                                $email = $row[2];      
                                $Filiere = $row[3];    
                                $password = password_hash($row[4], PASSWORD_DEFAULT);
                                $image = ''; // Assuming the image path or URL is not included in CSV
                                $CNE = $row[5];       
                                $CIN = $row[6];       

                                // Insert the row into the database
                                $result = $db->query(
                                    "INSERT INTO students (id, firstname, lastname, email, Filiere, date, idClasse, password, image, CNE, CIN) VALUES (?, ?, ?, ?, ?, NOW(), 1, ?, ?, ?, ?)", 
                                    [$id, $firstname, $lastname, $email, $Filiere, $password, $image, $CNE, $CIN]
                                );

                                if ($result) {
                                    echo "Données insérées pour: $firstname $lastname ($email)<br/>";
                                } else {
                                    echo "Erreur d'insertion pour: $firstname $lastname ($email)<br/>";
                                }
                            }
                            fclose($fichier);
                            echo 'Importation des données réussie';
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
