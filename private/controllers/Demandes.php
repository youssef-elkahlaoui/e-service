<?php 

class Demandes extends Controller {
    public function demande() {
        // Create a new instance of the Database class
        $db = new Database();
        
        // Fetch all data from the demands table
        try {
            $demandes = $db->query("SELECT * FROM demands");
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
        $this->view('demandes', ['demandes' => $demandes]);
    }
}
