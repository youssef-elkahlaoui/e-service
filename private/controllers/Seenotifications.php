<?php 
class Seenotifications extends Controller{
    
    public function scroll() {
        try {
            $db = new Database(); 
            $query = "SELECT message FROM notifications ORDER BY DateNotification DESC LIMIT 3"; 
            $notifications = $db->query($query);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $notifications = [];
        }
        return $notifications;
    }
}
?>