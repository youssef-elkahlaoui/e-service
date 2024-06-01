<?php

class ArchiveNotif extends Controller {
    public function archive() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive'])) {
            $archive = $_POST['archive'];

           try {
                $db = new Database();
                $query = "UPDATE notifications SET Archive = '1' WHERE IdNotification = :id";
                $result = $db->query($query, ['id' => $archive]);

                $_SESSION['message'] = "Notification archivée avec succès.";
            } catch (PDOException $e) {
                $_SESSION['message'] = "Erreur : " . $e->getMessage();
            }
            header("Location: " . ROOT . "/admins/archivenotif");
            exit();
        }
    }
}

?>
