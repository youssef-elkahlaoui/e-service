<?php
class Reset_password extends Controller {
    public function modifyPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
            
            $token = isset($_POST['token']) ? $_POST['token'] : '';
            $password = $_POST['password'];

            if (!empty($token) && !empty($password)) {
                $db = new Database();
                $result = $db->query("SELECT * FROM students WHERE reset_token = ? AND token_expiry > NOW()", [$token]);

                if ($result && !empty($result)) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $updateResult = $db->query("UPDATE students SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?", [$hashedPassword, $token]);

                    if ($updateResult !== false) {
                        // Password updated successfully
                        $message= '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Password updated successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    } else {
                        // Error updating password
                        $message= '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Error updating password. Please try again later.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                } else {
                    // Invalid or expired token
                    $message='
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Invalid or expired token.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            } else {
                // Token or password empty
                $message= '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please provide a valid token and a new password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        } 
    }

    public function index() {
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $this->view("modifypassword", ['token' => $token]);
    }
}

?>