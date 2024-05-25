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
    public function index() {
        $notifications = $this->scroll(); 
        $this->view('home.admin', ['notifications' => $notifications]); 
    }
}
?>