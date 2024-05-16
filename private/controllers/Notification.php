<?php
class Notification extends Controller {

    public function sendNot() {
        // No initialization needed in the constructor
        require './assets/PHPMailer-master/src/PHPMailer.php';
        require './assets/PHPMailer-master/src/SMTP.php';
        require './assets/PHPMailer-master/src/Exception.php';

        if(isset($_POST['notif'])){
            $notification = $_POST['notification'];
            $choice = $_POST['selectedoption'];
            $db = new Database();   

            // Initialize PHPMailer
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try {
                $students = $db->query("SELECT * FROM send");

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anass.essafi@etu.uae.ac.ma';
                $mail->Password = 'dkmj kcwr waqm fedr'; 
                $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('anass.essafi@etu.uae.ac.ma', 'ANASS');
                $mail->Subject = "Don't reply to this message";

                foreach($students as $student) {
                    if($choice === "ALL" || $student->Filiere == $choice) {
                        $mail->clearAddresses(); 
                        $mail->addAddress($student->Email, $student->Prénom); 
                        $mail->Body = $notification;
                        $mail->send();
                    }
                }
                echo 'Mail has been sent successfully<br>';
            } catch(\PHPMailer\PHPMailer\Exception $ex) {
                echo 'Error: '. $ex->getMessage();
            }
            try{
                $db->query("INSERT INTO notification (Filiere,Message,DateTime) VALUES (?,?,NOW())",array($choice,$notification));
                echo "Notification has been inserted succesfully in Database";
            }catch(Exception $e){
                echo "Error inserting Notiifcation in Database". $e->getMessage();
            }
        }
    }

    public function index() {
        $this->view('SendNotification');
    }
}

?>
