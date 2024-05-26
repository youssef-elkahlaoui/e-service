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
            if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
                $file_type = $_FILES['pdf']['type'];
                $allowed_types = ['application/pdf'];

                if (!in_array($file_type, $allowed_types)) {
                    echo 'Type de fichier incorrect ! Le fichier doit être au format PDF !!';
                } else {
                    $pdf_file = $_FILES['pdf']['tmp_name'];
                    $file_name = basename($_FILES['pdf']['name']);
                    $upload_dir = "../uploads/$type/";
                    $upload_file = $upload_dir . $file_name;

                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }

                    if (move_uploaded_file($pdf_file, $upload_file)) {
                        $titre = $_POST['titre'];
                        $description = $_POST['description'];
                        $idClasse = $_POST['selectedoption'];
                        $idModule = $_POST['idModule']; 
                        $db = new Database();
                        try {
                            $db->query(
                                "INSERT INTO cours (Titre, Description, IdClasse, FilePath, IdModule) VALUES (?, ?, ?, ?, ?)",
                                [$titre, $description, $idClasse, $upload_file, $idModule]
                            );
                            echo '<script>alert("Téléchargement réussi.");</script>';
                            $this->view($view);
                        } catch (PDOException $e) {
                            echo "Erreur d'insertion dans la base de données: " . $e->getMessage();
                        }
                    } else {
                        echo 'Erreur lors du téléchargement du fichier.';
                    }
                }
            } else {
                echo 'Erreur lors du téléchargement du fichier.';
            }
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

            // Render the view with results
            $this->view('doc.etu', ['results' => $results, 'type' => $type]);
        } else {
            echo "Aucun résultat à afficher.";
        }
    }

    // public function index()
    // {
    //     $type = isset($_GET['type']) ? $_GET['type'] : 'cours';
    //     if ($type === 'exercices') {
    //         $this->view('exercices');
    //     } else {
    //         $this->view('cours');
    //     }
    // }
}
?>
