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
		$notif= new Notification();
		$data = $notif->where('idclass',Auth::getIdclasse());

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

		$data = $user->where('idclasse',Auth::getIdclasse());
        $this->view('classe.etu',['data'=>$data]);
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


    // ...
    function note()
    {
        if (!Auth::studentLoggedIn()) {
            $this->redirect('login');
        }

        $note = new Note();
        $data = $note->calculateAllModuleGrades(Auth::getId());
        $this->view('notes.etu', ['data' => $data]);
    }


	function seulnote($id) {
		if (!Auth::studentLoggedIn()) {
			$this->redirect('login');
		}
	
		$note = new Note();
		$module = new Module();
	
		// Check if the course exists
		$courseData = $module->where('IdCours', $id);
		if (empty($courseData)) {
			$this->redirect('404'); // Redirect to an error page if the course does not exist
		}
	
		// Check if the student is enrolled in the course
		$studentId = Auth::getId();
		$enrolled = false;
	
		// Assuming course data contains the idClasse
		foreach ($courseData as $course) {
			if (@$course->idClasse == $studentId) {
				$enrolled = true;
				break;
			}
		}
	
		if (!$enrolled) {
			$this->redirect('404'); // Redirect to an error page if the student is not enrolled in the course
		}
	
		// Manually construct the query to fetch the notes for the specific course and student
		$query = "SELECT * FROM notes WHERE IdCours = :IdCours AND idstudent = :idstudent";
		$data = $note->query($query, ['IdCours' => $id, 'idstudent' => $studentId]);
	
		// Check if data is fetched properly
		if (empty($data)) {
			// Handle the case where no notes are found
			$this->view('note.etu', ['message' => 'No notes found for this course.', 'module' => $courseData]);
		} else {
			$this->view('note.etu', ['note' => $data, 'module' => $courseData]);
		}
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

		function etatDemande()
		{
			// Vérifie si l'étudiant est connecté
			if (!Auth::studentLoggedIn()) {
				$this->redirect('login');
			}
	
			// Obtenir l'ID de l'étudiant depuis la session
			$student_id = $_SESSION['STUDENT']->id;
	
			// Récupérer toutes les demandes de l'étudiant connecté
			$sql = "SELECT * FROM demands WHERE student_id = ?";
			try {
				$db = new Database();
				$demands = $db->query($sql, [$student_id]);
				$this->view('demande.etat.etu', ['demands' => $demands]);
			} catch (Exception $e) {
				$this->view('demande.etat.etu', ['error' => "Erreur lors de la récupération des demandes: " . $e->getMessage()]);
			}
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
		$module = new Module();
		
		// Récupérer les données des modules pour la classe actuelle
		$modulesData = $module->where('IdClasse', Auth::getIdclasse());
		
		// Créer un tableau pour stocker les données des modules avec les noms des professeurs

        $this->view('devoir.etu',['module' => $modulesData]);
    }
    
 function modules() {
    if (!Auth::studentLoggedIn()) {
        $this->redirect('login');
    }
    
    $module = new Module();
    $teacher = new Teacher();
    
    // Récupérer les données des modules pour la classe actuelle
    $modulesData = $module->where('IdClasse', Auth::getIdclasse());
    
    // Créer un tableau pour stocker les données des modules avec les noms des professeurs
    $modulesWithTeacherNames = [];
    
    // Vérifier si $modulesData est un tableau ou un objet
    if (is_array($modulesData) || is_object($modulesData)) {
        // Pour chaque module, obtenir le nom du professeur correspondant
        foreach ($modulesData as $moduleData) {
            // Récupérer le nom du professeur pour ce module
            $teacherData = $teacher->where('id', $moduleData->IdEnseignant);
            
            // Vérifier si $teacherData est un tableau ou un objet
            if (is_array($teacherData) || is_object($teacherData)) {
                // Utiliser la méthode where pour récupérer uniquement le premier professeur correspondant
                $teacherData = count($teacherData) > 0 ? $teacherData[0] : null;
            } else {
                // Si $teacherData n'est ni un tableau ni un objet, définir $teacherData sur null
                $teacherData = null;
            }
            
            // Ajouter les données du module avec le nom du professeur au tableau
            $modulesWithTeacherNames[] = [
                'module' => $moduleData,
                'teacher' => $teacherData
            ];
        }
    }
    
    // Passer les données des modules avec les noms des professeurs à la vue
    $this->view("modules", ['modulesWithTeacherNames' => $modulesWithTeacherNames]);
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

	function test($id,$allo){
		$this->view('test', ['id'=> $id,'allo'=> $allo]);
	} 
}