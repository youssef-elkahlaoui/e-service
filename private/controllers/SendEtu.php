<?php 

class SendEtu extends Controller
{
	function demande()
	{
		// Vérifie si l'étudiant est connecté
		if (!Auth::studentLoggedIn()) {
			$this->redirect('login');
		}
	
		// Traitement de la soumission du formulaire
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Assainir les données d'entrée
			$sujet = htmlspecialchars($_POST['sujet'], ENT_QUOTES, 'UTF-8');
			$demande_type = htmlspecialchars($_POST['demande_type'], ENT_QUOTES, 'UTF-8');
			$description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
	
			// Valider les entrées
			if (empty($sujet) || empty($demande_type) || empty($description)) {
				$this->view('demande.etu', ['error' => "Tous les champs sont obligatoires."]);
				return;
			}
	
			// Obtenir l'ID de l'étudiant depuis la session
			$student_id = $_SESSION['STUDENT']->id;
	
			// Créer une nouvelle instance de Demand
			$demand = new Demand();
	
			// Définir les valeurs
			$demand->student_id = $student_id;
			$demand->demand_type = $demande_type;
			$demand->demand_description = $description;
			$demand->demand_date = date('Y-m-d H:i:s'); // En supposant que demand_date est une colonne de type datetime
            $demand->status= 'en attend';
			// Enregistrer la demande
			try {
				$saved = $demand->insert((array) $demand); // Insérer les données de la demande dans la base de données
				if ($saved) {
					$this->view('demande.etu', ['success' => "Demande enregistrée avec succès."]);
					return;
				} else {
					$this->view('demande.etu', ['error' => "Erreur lors de l'enregistrement de la demande. Veuillez réessayer plus tard."]);
					return;
				}
			} catch (Exception $e) {
				// Gérer les erreurs de base de données
				$this->view('demande.etu', ['error' => "Erreur lors de l'enregistrement de la demande: " . $e->getMessage()]);
				return;
			}
		}
	
		// Si la méthode est GET, affiche simplement la vue sans messages
		$this->view('demande.etu');
	}
	


	
	function sendDevoir()
    {
        // Vérifie si l'étudiant est connecté
        if (!Auth::studentLoggedIn()) {
            $this->redirect('login');
        }
		$module = new Module();
		
		// Récupérer les données des modules pour la classe actuelle
		$modulesData = $module->where('IdClasse', Auth::getIdclasse());
		
		// Créer un tableau pour stocker les données des modules avec les noms des professeurs

        // Traitement de la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assainir les données d'entrée
            $sujet = htmlspecialchars($_POST['sujet'], ENT_QUOTES, 'UTF-8');
            $module = htmlspecialchars($_POST['module'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

            // Valider les entrées
            if (empty($sujet) || empty($module) || empty($description)) {

                $this->view('devoir.etu', ['module' => $modulesData,'error' => "Tous les champs sont obligatoires."]);
                return;
            }

            // Vérifier si un fichier a été téléchargé
            if (!empty($_FILES['fichier']['name'])) {
                // Répertoire de téléchargement des fichiers
                $uploadDir = "uploads/";

                // Nom du fichier téléchargé
                $fileName = basename($_FILES["fichier"]["name"]);

                // Chemin complet du fichier sur le serveur
                $uploadFile = $uploadDir . $fileName;

                // Déplacer le fichier téléchargé vers le répertoire de téléchargement
                if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $uploadFile)) {
                    // Créer une nouvelle instance de Devoir
                    $devoir = new Devoir();

                    // Définir les valeurs
                    $data = [
                        'id_etudiant' => $_SESSION['STUDENT']->id,
                        'sujet' => $sujet,
                        'fichier' => $fileName,
                        'fichier_chemin' => $uploadFile,
                        'id_module' => $module,
                        'description' => $description,
                        'date_creation' => date('Y-m-d H:i:s')
                    ];

                    // Enregistrer le devoir dans la base de données
                    try {
                        $saved = $devoir->insert($data);
                        if ($saved) {
                            $this->view('devoir.etu', ['module' => $modulesData,'success' => "Devoir envoyé avec succès."]);
                            return;
                        } else {
                            $this->view('devoir.etu', ['module' => $modulesData,'error' => "Erreur lors de l'enregistrement du devoir. Veuillez réessayer plus tard."]);
                            return;
                        }
                    } catch (Exception $e) {
                        $this->view('devoir.etu', ['module' => $modulesData,'error' => "Erreur lors de l'enregistrement du devoir: " . $e->getMessage()]);
                        return;
                    }
                } else {
                    $this->view('devoir.etu', ['module' => $modulesData,'error' => "Erreur lors de l'envoi du fichier. Veuillez réessayer."]);
                    return;
                }
            } else {
                $this->view('devoir.etu', ['module' => $modulesData,'error' => "Veuillez sélectionner un fichier."]);
                return;
            }
        }

        // Si la méthode est GET, affiche simplement la vue sans messages
		$this->view('devoir.etu', ['module'=> $modulesData]);
    }
	
	
	

    function index()
    {
        $this->view('demande.etu');
    }
}
