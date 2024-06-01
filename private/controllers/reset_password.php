<?php
class Reset_password extends Controller {
    public function modifyPassword() {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
            $token = isset($_POST['token']) ? $_POST['token'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (!empty($token) && !empty($password)) {
                $db = new Database();
                
                $result = $db->query("SELECT * FROM students WHERE reset_token = ? AND token_expiry > NOW()", [$token]);

                if ($result && count($result) > 0) {
                    $student = $result[0];
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                   
                    $updateResult = $db->query("UPDATE students SET password = ?, reset_token = NULL, token_expiry = NULL WHERE id = ?", [$hashedPassword, $student->id]);

                    if ($updateResult !== false){
                        $message = '<div class="alert alert-success">Password updated successfully.</div>';
                    } else {
                        $message = '<div class="alert alert-danger">Error updating password. Please try again later.</div>';
                    }
                } else {
                    $message = '<div class="alert alert-warning">Invalid or expired token.</div>';
                }
            } else {
                $message = '<div class="alert alert-danger">Please provide a valid token and a new password.</div>';
            }
        }

        $this->view("modifypassword", ['message' => $message, 'token' => $token]);
    }

    public function index() {
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $this->view("modifypassword", ['token' => $token]);
    }
}
?>
