<?php

class ArchiveNotif extends Controller {

    public function archive() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive'])) {
            $archive = $_POST['archive'];
            try {
                $db = new Database(); 
                $query = "UPDATE notifications SET archivé = '1' WHERE IdNotification = :id ";
                $result = $db->query($query, ['id' => $archive]);

                if ($result) {
                    header("Location: /e-service/public/Allnotification");
                    exit();
                }else{
                    header("Location: /e-service/public/Allnotification");
                    exit();
                }
            }catch(PDOException $e){

                header("Location: /e-service/public/Allnotification");
                exit();
            }
        } else {
            header("Location: /e-service/public/Allnotification");
            exit();
        }
    }

    public function index() {
        $this->view("seenotifications.admin");
    }
}

?>
