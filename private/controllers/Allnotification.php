<?php
class Allnotification extends Controller{
    public function allnotifications(){
        try {
            $db = new Database(); 
            $query = "SELECT * FROM notifications"; 
            $notifications = $db->query($query, [], "assoc");
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            $notifications = [];
        }
        return $notifications;
    }
   
    public function index() {
        
        $allnotifications = $this->allnotifications();
        $this->view('seenotifications.admin', ['allnotifications' => $allnotifications]);
    }
}