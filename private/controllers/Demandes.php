<?php 

class Demandes extends Controller {
    public function demande() {
        // Create a new instance of the Database class
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
        
        return $demandes; // Return the fetched data
    }

    public function index() {
        // Fetch the data
        $demandes = $this->demande();
        
        // Pass the fetched data to the view
        $this->view('demandes.admin', ['demandes' => $demandes]);
    }
}
