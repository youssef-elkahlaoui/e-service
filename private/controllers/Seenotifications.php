<?php
class Seenotifications extends Controller {
    public function scroll() {
        try {
            $db = new Database(); 
            $query = "SELECT message FROM notifications ORDER BY DateNotification DESC LIMIT 4"; 
            $notifications = $db->query($query, [], "assoc");
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            $notifications = [];
        }
        return $notifications;
    }
    public function Allnotifications(){
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
        $notifications = $this->scroll(); 
        $allnotifications = $this->Allnotifications();

        $this->view('home.admin', ['notifications' => $notifications]); 
        $this->view('archivageNotifs.admin', ['allnotifications' => $allnotifications]);
    }
}
?>