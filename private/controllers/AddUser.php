<?php

class AddUser extends Controller {
    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $rank = $_POST['rank'];
            $password = $_POST['password'];
            $confirmation = $_POST['confirmation'];
            $filiere = $_POST['filiere'] ?? '';
            $CNE = $_POST['cne'] ?? '';
            $CIN = $_POST['cin'];

            $errors = [];
            if ($password !== $confirmation) {
                $errors[] = "Passwords do not match";
            }
            
            if (empty($errors)) {
                $db = new Database();
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                
                try {
                    if ($rank == 'student') {
                        $result = $db->query("INSERT INTO students (firstname, lastname, email, filiere, date, password, cne, cin) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)",
                        [$firstname, $lastname, $email, $filiere, $hashed_password, $CNE, $CIN]);
                        if($result){
                        $success_message = "Student added successfully";}else{echo 'ghyrha';}
                    } else if ($rank == 'prof') {
                        $db->query("INSERT INTO teachers (firstname, lastname, email, date, password, cin) VALUES (?, ?, ?, NOW(), ?, ?)",
                        [$firstname, $lastname, $email, $hashed_password, $CIN]);
                        $success_message = "Teacher added successfully";
                    } else if ($rank == 'admin') {
                        $db->query("INSERT INTO admins (firstname, lastname, email, date, password, cne, cin) VALUES (?, ?, ?, NOW(), ?, ?, ?)",
                        [$firstname, $lastname, $email, $hashed_password, $CNE, $CIN]);
                        $success_message = "Admin added successfully";
                    }
                } catch (PDOException $e) {
                    $errors[] = "Error adding user: " . $e->getMessage();
                }
            }
            
            // Load the view with feedback
            $this->view('AjouterUser', ['errors' => $errors, 'success_message' => $success_message ?? null]);
        } else {
            // Load the view if not a POST request
            $this->view('AjouterUser');
        }
    }
}

?>
