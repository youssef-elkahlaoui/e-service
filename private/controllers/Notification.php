<?php
class Notification extends Controller {

    public function sendNot() {
        
        require './assets/PHPMailer-master/src/PHPMailer.php';
        require './assets/PHPMailer-master/src/SMTP.php';
        require './assets/PHPMailer-master/src/Exception.php';

        if (isset($_POST['notif'])) {
            $notification = $_POST['notification'];
            $choice = $_POST['selectedoption'];
            $db = new Database();

            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $message = '';
            $message1 = '';

            try {
                $students = $db->query("SELECT * FROM students WHERE IdClasse = ?", [$choice]);

                if ($students === false) {
                    throw new Exception("Error fetching students from the database.");
                }

                // Setup PHPMailer
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anass.essafi@etu.uae.ac.ma';
                $mail->Password = 'dkmj kcwr waqm fedr'; 
                $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('anass.essafi@etu.uae.ac.ma', 'ANASS');
                $mail->Subject = "Don't reply to this message";

                // Send emails to students
                foreach ($students as $student) {
                    $mail->clearAddresses(); 
                    $mail->addAddress($student->email);
                    $mail->Body = $notification;
                    $mail->send();
                }
                $message = 'Mail has been sent successfully<br>';
            } catch (\PHPMailer\PHPMailer\Exception $ex) {
                $message = 'Error: ' . $ex->getMessage();
            } catch (Exception $e) {
                $message = 'Error: ' . $e->getMessage();
            }

            try {
                // Insert notification into the database
                $db->query("INSERT INTO notifications (idclass, Message, DateNotification) VALUES (?, ?, NOW())", [$choice, $notification]);
                $message1 = "Notification has been inserted successfully in the Database";
            } catch (Exception $e) {
                $message1 = "Error inserting Notification in the Database: " . $e->getMessage();
            }

            // Load the view with messages
            $this->view("SendNotification", ['message' => $message, 'message1' => $message1]);
        }
    }
}
?>
