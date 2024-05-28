<?php

class CoursExercices extends Controller
{
    public function uploadCour()
    {
        $this->handleUpload('cours', 'cours');
    }

    public function uploadExercice()
    {
        $this->handleUpload('exercices', 'exercices');
    }
    

    private function handleUpload($type, $view)
    {
        if (!empty($_FILES) && isset($_POST['upload'])) {
            $pdf_file = null;
            $video_file = null;
    
            if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
                $file_type = $_FILES['pdf']['type'];
                $allowed_types = ['application/pdf'];
    
                if (!in_array($file_type, $allowed_types)) {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format PDF !!';
                    return;
                } else {
                    $pdf_file = $_FILES['pdf']['tmp_name'];
                    $file_name = basename($_FILES['pdf']['name']);
                    $upload_dir = "../uploads/$type/";
                    $upload_file = $upload_dir . $file_name;
    
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
    
                    if (!move_uploaded_file($pdf_file, $upload_file)) {
                        echo 'Erreur lors du téléchargement du fichier PDF.';
                        return;
                    }
                    $pdf_file = $upload_file;
                }
            }
    
            if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
                $file_type = $_FILES['video']['type'];
                $allowed_types = ['video/mp4', 'video/avi', 'video/mpeg', 'video/quicktime'];
    
                if (!in_array($file_type, $allowed_types)) {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format vidéo (MP4, AVI, MPEG, QuickTime) !!';
                    return;
                } else {
                    $video_file = $_FILES['video']['tmp_name'];
                    $file_name = basename($_FILES['video']['name']);
                    $upload_dir = "../uploads/$type/";
                    $upload_file = $upload_dir . $file_name;
    
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
    
                    if (!move_uploaded_file($video_file, $upload_file)) {
                        echo 'Erreur lors du téléchargement du fichier vidéo.';
                        return;
                    }
                    $video_file = $upload_file;
                }
            }
    
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $idModule = $_POST['module'];
            $db = new Database();
    
            try {
                if($pdf_file){
                    $db->query(
                        "INSERT INTO cours (Titre, Description,FilePath, IdModule) VALUES (?, ?, ?, ?)",
                        [$titre, $description, $pdf_file, $idModule]
                    );
                }
                
                if($video_file){            
                    $db->query(
                        "INSERT INTO cours (Titre, Description, FilePath, IdModule) VALUES (?, ?, ?, ?)",
                        [$titre, $description, $video_file, $idModule]
                    );
                }
                echo '<script>
                alert("Téléchargement réussi.");
                window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
                </script>';
                exit();
            } catch (PDOException $e) {
                echo "Erreur d'insertion dans la base de données: " . $e->getMessage();
            }
        } else {
            echo 'Erreur lors du téléchargement des fichiers.';
        }
    }


    public function displayDoc($idClasse, $idModule)
    {
        if (!Auth::studentLoggedIn()) {
            $this->redirect('login');
        }

        $db = new Database();
        $coursData = $db->query(
            "SELECT * FROM cours WHERE IdClasse = ? AND IdModule = ?",
            [$idClasse, $idModule]
        );

        if ($coursData) {
            $this->view("doc.etu", ['data' => $coursData]);
        } else {
            $this->view('doc.error.etu');
        }
    }

    public function displayResults()
    {
        if (isset($_SESSION['results']) && isset($_SESSION['type'])) {
            $results = $_SESSION['results'];
            $type = $_SESSION['type'];
            unset($_SESSION['results']);
            unset($_SESSION['type']);

            $this->view('doc.etu', ['results' => $results, 'type' => $type]);
        } else {
            echo "Aucun résultat à afficher.";
        }
    }

}
?>
