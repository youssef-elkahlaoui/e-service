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
        $this->view('absence.prof');
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
        $this->view('listetu.prof');
    }

    function listeAdmin(){
        $this->view('listeAdmin.prof');
    }

	function listeProf(){
        $this->view('listeProf.prof');
    }

	function notifProfsend(){
        $this->view('SendNotProf');
    }

    function archProf(){
        $this->view('arch.prof');
    }
    function notifProfget(){
        $this->view('notif.get.prof');
    }
    
	public function cours(){
        $this->view('cours');
    }

    function exercices(){
        $this->view('exercices.prof');
    }

    function note(){
        $this->view('importNotes');
    }

    function profile($id = null){
        $this->view("profile.prof");
    }
}