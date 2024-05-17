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
                        fgetcsv($fichier); // Skip the header row
                        try {
                            // Determine the highest existing ID in the students table
                            $result = $db->query("SELECT MAX(id) AS max_id FROM students");
                            $next_id = intval($result[0]->max_id) + 1;

                            while (($row = fgetcsv($fichier)) !== false) {


                                // Add an empty value for the id column if it's missing
                                if (count($row) == 7) {
                                    array_unshift($row, ""); // Add an empty value at the beginning
                                }

                                // Check if the row has at least 8 columns
                                if (count($row) < 8) {
                                    echo "Ligne CSV invalide: " . implode(", ", $row) . " (Number of columns: " . count($row) . ")<br/>";
                                    continue;
                                }

                                $id = $next_id++;
                                $firstname = $row[1];  
                                $lastname = $row[2];   
                                $email = $row[3];      
                                $Filiere = $row[4];    
                                $password = password_hash($row[5], PASSWORD_DEFAULT);
                                $CNE = $row[6];       
                                $CIN = $row[7];       

                                // Insert the row into the database
                                $result = $db->query(
                                    "INSERT INTO students (id, firstname, lastname, email, Filiere, date, idClasse, password, CNE, CIN) VALUES (?, ?, ?, ?, ?, NOW(), 1, ?, ?, ?)", 
                                    [$id, $firstname, $lastname, $email, $Filiere, $password, $CNE, $CIN]
                                );                                
                            }
                            fclose($fichier);
                            echo 'Importation des données avec succées';
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