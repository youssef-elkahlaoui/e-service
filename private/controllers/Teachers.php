<?php 

class Teachers extends Controller
{

    function index()
	{
		if(!Auth::teacherLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Teacher();

		$data = $user->findAll();
		$this->view('home.prof',['rows'=>$data]);
    }
    
    function absence(){
        $teacherId = Auth::getId();
        $modules = (new Module())->query(
            "SELECT modules.*, classes.NomClasse as class_name 
            FROM modules 
            JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
            JOIN classes ON modules.IdClasse = classes.IdClasse
            WHERE teacher_modules.teacher_id = ?", [$teacherId]
        );

        $this->view('absence.prof',['modules' => $modules]);
    }

    function archivecours(){
        $dcourses = Cour::getArchived();
        $courses = Cour::getDesarchived();
        $this->view('archive', ['courses' => $courses, 'dcourses' => $dcourses]);
    }

    public function archive($id) {
        Cour::archiveById($id);
        $this->archivecours();
    }
    public function desarchive($id) {
        Cour::desarchiveById($id);
        $this->archivecours();
    }

	function listeStudent(){
        $studentModel = new Student();
        $students = $studentModel->findAll(); 
        $this->view('listetu.prof', ['students' => $students]);
    }

    function listeAdmin(){
        $adminModel = new Admin();
        $admins = $adminModel->findAll(); 
        $this->view('listeAdmin.prof', ['admins' => $admins]);
    }

	function listeProf(){
        $teacherModel = new Teacher();
        $teachers = $teacherModel->findAll(); 
        $this->view('listeProf.prof', ['teachers' => $teachers]);
    }

	function notifProfsend(){
	    $teacherId = Auth::getId();
	    $classe = new Classe();
        $classes= $classe->query(
            "SELECT classes.* 
            FROM classes 
            JOIN teacher_classes ON classes.IdClasse = teacher_classes.id_class
            WHERE teacher_classes.id_teacher = ?", [$teacherId]
        );
        $this->view('SendNotProf',['classes'=>$classes]);
    }

    function archProf(){
        $this->view('arch.prof');
    }
    function notifProfget(){
        $this->view('notif.get.prof');
    }
    
	public function cours(){
        $teacherId = Auth::getId();

        $modules = (new Module())->query(
            "SELECT modules.* 
            FROM modules 
            JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
            WHERE teacher_modules.teacher_id = ?", [$teacherId]
        );
        $this->view('cours',['modules' => $modules]);
    }

    function td(){
        $teacherId = Auth::getId();

        $modules = (new Module())->query(
            "SELECT modules.* 
            FROM modules 
            JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
            WHERE teacher_modules.teacher_id = ?", [$teacherId]
        );
        $this->view('exercices',['modules' => $modules]);
    }

    function note(){
        $teacherId = Auth::getId();

        $modules = (new Module())->query(
            "SELECT modules.*, classes.NomClasse as class_name 
            FROM modules 
            JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
            JOIN classes ON modules.IdClasse = classes.IdClasse
            WHERE teacher_modules.teacher_id = ?", [$teacherId]
        );

        $this->view('ImportNotes',['modules' => $modules]);
    }

    function profile($id = null){
        
        $teacherId = Auth::getId();

        $modules = (new Module())->query(
            "SELECT modules.*, classes.NomClasse as class_name 
            FROM modules 
            JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
            JOIN classes ON modules.IdClasse = classes.IdClasse
            WHERE teacher_modules.teacher_id = ?", [$teacherId]
        );

        $this->view('profile.prof', ['modules' => $modules]);
    }

    function devoire(){
                $devoir = new Devoir();
                $teacherId = Auth::getId();
        
                $modules = (new Module())->query(
                    "SELECT * FROM modules 
                    JOIN teacher_modules ON modules.IdCours = teacher_modules.module_id
                    WHERE teacher_modules.teacher_id = ?", [$teacherId]
                );
        
                $moduleIds = array_map(function ($module) {
                    return $module->IdCours;
                }, $modules);
        
                if (count($moduleIds) > 0) {
                    $placeholders = implode(',', array_fill(0, count($moduleIds), '?'));
                    $devoirs = $devoir->query(
                        "SELECT devoirs.*, students.firstname, students.lastname 
                        FROM devoirs 
                        JOIN students ON devoirs.id_etudiant = students.id 
                        WHERE id_module IN ($placeholders)", $moduleIds
                    );
                } else {
                    $devoirs = [];
                }
        
                $this->view('devoire.prof', ['devoirs' => $devoirs]);
            }
function emplois() {

    $db = new Database;
    $emplois = $db->query("SELECT * FROM emploi ORDER BY date DESC", []);
    if ($emplois === false) {
        $emplois = []; 
    }

    $this->view('emplois', ['emplois' => $emplois]);
}

}