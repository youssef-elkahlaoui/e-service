<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/PHPMailer-master/src/PHPMailer.php';
require './assets/PHPMailer-master/src/SMTP.php';
require './assets/PHPMailer-master/src/Exception.php';

class ImportUsers extends Controller {
    public function import() {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

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
                        fgetcsv($fichier); // Skip the header row
                        $newUsersIds = [];
                        try {
                            $result = $db->query("SELECT MAX(id) AS max_id FROM students");
                            $next_id = intval($result[0]->max_id) + 1;

                            while (($row = fgetcsv($fichier)) !== false) {
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
                                $image = $row[5];
                                $CNE = $row[6];
                                $CIN = $row[7];

                                $result = $db->query(
                                    "INSERT INTO students (id, firstname, lastname, email, Filiere, date, idClasse, password, image, CNE, CIN) VALUES (?, ?, ?, ?, ?, NOW(), 1, ?, ?, ?, ?)",
                                    [$id, $firstname, $lastname, $email, $Filiere, $password, $image, $CNE, $CIN]
                                );
                                $newUsersIds[] = $id; 
                            }
                            
                            fclose($fichier);
                            echo 'Importation des données réussie <br>';

                        } catch (PDOException $e) {
                            echo "Erreur d'insertion dans la base de données: " . $e->getMessage();
                        }

                        try {
                            // SMTP configuration
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'anass.essafi@etu.uae.ac.ma';
                            $mail->Password = 'dkmj kcwr waqm fedr'; 
                            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 587; 

                            // Sender
                            $mail->setFrom('anass.essafi@etu.uae.ac.ma', 'ANASS');

                            foreach ($newUsersIds as $newUserId) {
                                $result = $db->query("SELECT * FROM students WHERE id = ?", [$newUserId]);
                                $user = $result[0];

                                $token = bin2hex(random_bytes(16));
                                $tokenExpiry = date('Y-m-d H:i:s', strtotime('+1 day'));

                                
                                $db->query("UPDATE students SET reset_token = ?, token_expiry = ? WHERE id = ?", [$token, $tokenExpiry, $newUserId]);

                                // Send email with token link
                                $resetLink = "http://localhost/e-service/public/reset_password/?token=$token";
                                $email = trim($user->email);
                                $mail->addAddress($email, $user->firstname);
                                $mail->Subject = "Vos données pour s'identifier à votre compte";
                                $mail->Body = "Bonjour {$user->firstname},\n\nVoici le lien pour définir votre mot de passe : \n\n$resetLink\n\nCe lien expirera dans un jour.";

                                $mail->send();
                                $mail->clearAddresses();
                            }
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
