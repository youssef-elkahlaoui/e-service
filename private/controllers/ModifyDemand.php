<?php

class ModifyDemand extends Controller {
    public function modify() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approuver'])) {
            $demand_id = $_POST['approuver'];

            try {
                $db = new Database();
                $query = "UPDATE demands SET status = 'Approuvé' WHERE id = :id";
                $result = $db->query($query, ['id' => $demand_id]);

                $_SESSION['message'] = "Demande approuvée avec succès.";
            } catch (PDOException $e) {
                $_SESSION['message'] = "Erreur : " . $e->getMessage();
            }

            header("Location: " . ROOT . "/admins/getDemandes");
            exit();
        }
    }
}
?>
