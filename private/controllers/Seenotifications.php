<?php
class Seenotifications extends Controller {
    public function scroll() {
        $db = new Database(); 
        try {
            $notifications = $db->query("SELECT message FROM notifications ORDER BY DateNotification DESC LIMIT 4");
            
        } catch (PDOException $e) {
            echo ("Error: " . $e->getMessage());
            $notifications = [];
        }
        return $notifications;
    }
}
?>