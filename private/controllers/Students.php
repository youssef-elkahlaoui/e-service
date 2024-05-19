<?php 

class Students extends Controller
{
    function index()
	{
        		// code...
		if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new User();

		$data = $user->findAll();

		$this->view('home.etu',['rows'=>$data]);
    }
	
<<<<<<< HEAD
    function absence(){
        $this->view('absence.etu');
    }
=======
	function absence() {
		if (!Auth::studentLoggedIn()) {
			$this->redirect('login');
		}
		$abs = new Absence();
		$module = new Module();
		
		// Récupérer les absences de l'étudiant
		$dataAbs = $abs->where('IdStudent', Auth::getId());
		
		// Vérifier si $dataAbs est un tableau valide
		if (!is_array($dataAbs)) {
			// Gérer le cas où la requête ne renvoie pas de résultats
			$dataAbs = [];
		}
	
		// Récupérer les identifiants de cours uniques des absences
		$courseIds = array_unique(array_map(function($absence) {
			return $absence->IdCours;
		}, $dataAbs));
		
		// Récupérer les noms des modules pour ces cours
		$dataMod = [];
		foreach ($courseIds as $courseId) {
			$moduleData = $module->where('IdCours', $courseId);
			if (!empty($moduleData)) {
				$dataMod[$courseId] = $moduleData[0]->Titre; // Assumant que 'Titre' est le nom du module
			}
		}
		
		// Combiner les données d'absences avec les noms des modules
		foreach ($dataAbs as $absence) {
			$absence->ModuleName = $dataMod[$absence->IdCours] ?? 'Unknown';
		}
		
		// Afficher la vue avec les données d'absences
		$this->view('absence.etu', ['data' => $dataAbs]);
	}
	
>>>>>>> origin/youssef

	function classe(){
        $this->view('classe.etu');
    }

	function demande(){
        $this->view('demande.etu');
    }

	function note(){
        $this->view('note.etu');
    }

	function listeProf(){
        $this->view('listeProf');
    }

	function etatDemande(){
        $this->view('demande.etat.etu');
    }

	
    function documentation(){
        $this->view('documentation.etu');
    }

	function devoir(){
        $this->view('devoir.etu');
    }
    
    function modules(){
        $this->view("modules");
    }

    function profile($id = null){
        $this->view("profile");
    }
}