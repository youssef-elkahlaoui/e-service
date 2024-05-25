<?php

class Reset_password extends Controller {
    public function modifyPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
            
            $token = isset($_POST['token']) ? $_POST['token'] : '';
            $password = $_POST['password'];

            if (!empty($token) && !empty($password)) {
                $db = new Database();
                $result = $db->query("SELECT * FROM students WHERE reset_token = ? AND token_expiry > NOW()", [$token]);

                if ($result && !empty($result)){
                    
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $updateResult = $db->query("UPDATE students SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?", [$hashedPassword, $token],'assoc');

                    if($updateResult !=false){
                        echo "Password has been successfully updated.";    
                    }else{
                        echo "Erreur dans ";
                    }
                    
                } else {
                    echo "Invalid or expired token.";
                }
            } else {
                echo "Please provide a token and a new password.";
            }
        } 
    }

    public function index() {
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $this->view("modifypassword", ['token' => $token]);
    }
}
