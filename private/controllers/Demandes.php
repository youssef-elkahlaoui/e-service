<?php 


class Demandes extends Controller {
    public function demande() {
       
        $db = new Database();
        try {
            $demandes = $db->query("SELECT * FROM demands WHERE status = 'En attente'");
            if ($demandes === false) {
                $demandes = [];
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des données : " . $e->getMessage();
            $demandes = [];
        }
        
        return $demandes; 
    }

    public function index() {
        $this->view('demandes.admin');
    }
}
