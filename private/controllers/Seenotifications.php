<?php
class Seenotifications extends Controller {
    public function scroll() {
        $db = new Database(); 
        try {
            $query = "SELECT message FROM notifications ORDER BY DateNotification DESC LIMIT 4"; 
            $notifications = $db->query($query);
            if($notifications === false){
                $notifications = [];
            }
        } catch (PDOException $e) {
            echo ("Error: " . $e->getMessage());
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
