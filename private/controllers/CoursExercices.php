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
            $pdf_file = $this->uploadFile('pdf', ['application/pdf'], $type);
            $video_file = $this->uploadFile('video', ['video/mp4', 'video/avi', 'video/mpeg', 'video/quicktime'], $type);

            if ($pdf_file || $video_file) {
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $idModule = $_POST['module'];
                $db = new Database();

                try {
                    if ($pdf_file) {
                        $db->query(
                            "INSERT INTO cours (Titre, Description, FilePath, IdModule) VALUES (?, ?, ?, ?)",
                            [$titre, $description, $pdf_file, $idModule]
                        );
                    }
                    if ($video_file) {
                        $db->query(
                            "INSERT INTO cours (Titre, Description, FilePath, IdModule) VALUES (?, ?, ?, ?)",
                            [$titre, $description, $video_file, $idModule]
                        );
                    }
                    echo '<script> alert("Téléchargement réussi."); window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"; </script>';
                    exit();
                } catch (PDOException $e) {
                    echo "Erreur d'insertion dans la base de données: " . $e->getMessage();
                }
            } else {
                echo 'Erreur lors du téléchargement des fichiers.';
            }
        }
    }

    private function uploadFile($fileType, $allowedTypes, $type)
    {
        if ($_FILES[$fileType]['error'] === UPLOAD_ERR_OK) {
            $file_type = $_FILES[$fileType]['type'];
            if (!in_array($file_type, $allowedTypes)) {
                echo "Type de fichier incorrect ! Le fichier doit être au format " . implode(", ", $allowedTypes) . " !!";
                return null;
            } else {
                $tmp_file = $_FILES[$fileType]['tmp_name'];
                $file_name = basename($_FILES[$fileType]['name']);
                $upload_dir = "../uploads/$type/";
                $upload_file = $upload_dir . $file_name;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                if (!move_uploaded_file($tmp_file, $upload_file)) {
                    echo "Erreur lors du téléchargement du fichier $fileType.";
                    return null;
                }

                return $upload_file;
            }
        }
        return null;
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

   public function download($fileId)
{
    $db = new Database();
    $fileData = $db->query("SELECT FilePath FROM cours WHERE IdCours = ?", [$fileId]);

    if ($fileData) {
        $filePath = $fileData[0]->FilePath; 

        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filePath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit();
        } else {
            echo 'Le fichier n’a pas été trouvé.';
        }
    } else {
        echo 'Aucune donnée trouvée pour le fichier demandé.';
    }
}
}
?>