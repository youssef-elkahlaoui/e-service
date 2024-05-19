<?php

class ModifyDemand extends Controller {
    public function modify() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approuver'])) {
            $demand_id = $_POST['approuver'];

            try {
                $db = new Database();
                $query = "UPDATE demands SET status = 'Approuvé' WHERE id = :id";
                $result = $db->query($query, ['id' => $demand_id]);

                if ($result) {
                    // Set a session message
                    $_SESSION['message'] = "La demande a été approuvée avec succès.";
                } else {
                    $_SESSION['message'] = "Erreur lors de l'approuvation de la demande.";
                }
                
                // Reload the current page to reflect changes
                $this->redirect("demandes.admin.view.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['message'] = "Erreur : " . $e->getMessage();
                header("Location: demandes.admin.view.php");
                exit();
            }
        }
    }

    public function index() {
        $this->view("demandes.admin");
    }
}
?>
