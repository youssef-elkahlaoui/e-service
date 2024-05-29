<?php

class ModifyDemand extends Controller {
    public function modify() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approuver'])){
            $demand_id = $_POST['approuver'];

            try {
                $db = new Database();
                $query = "UPDATE demands SET status = 'Approuvé' WHERE id = :id";
                $result = $db->query($query, ['id' => $demand_id]);

               
                
                // Redirect to the Demandes page
                header("Location: /e-service/public/Demandes");
                exit();
            } catch (PDOException $e) {
                $_SESSION['message'] = "Erreur : " . $e->getMessage();
                // Redirect to the Demandes page
                header("Location: /e-service/public/Demandes");
                exit();
            }
        }
    }

    public function index() {
        $this->view("demandes.admin");
    }
}
?>
