<?php
class Allnotification extends Controller{
    public function allnotifications(){
    try {
        $db = new Database(); 
        $query = "SELECT notifications.*, classes.NomClasse AS NomFiliere
                  FROM notifications
                  JOIN classes ON notifications.idclass = classes.IdClasse"; 
        $notifications = $db->query($query);
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        $notifications = [];
    }
    return $notifications;
    }

   
    public function index() {
        
        $this->view('seenotifications.admin');
    }
}