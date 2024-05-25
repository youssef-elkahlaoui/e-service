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
		$user = new Student();

		$data = $user->findAll();

		$this->view('home.etu',['rows'=>$data]);
    }
	
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
	

	function classe(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

	function classe(){
        $this->view('classe.etu');
    }

	function demande(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('demande.etu');
    }

	function note(){
        $this->view('note.etu');
    }

	function listeProf(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('listeProf');
    }

	function etatDemande(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('demande.etat.etu');
    }

	
    function documentation(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('documentation.etu');
    }

	function devoir(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('devoir.etu');
    }
    
    function modules(){
        $this->view("modules");
    }

    function profile($id = null){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
        $classe = new Classe();
        $classeData=$classe->where('idClasse',Auth::getIdclasse());
        $classeData=$classeData[0];
        $this->view("profile.etu", ['data'=>$classeData]);
    }
}