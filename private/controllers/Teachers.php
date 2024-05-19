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

	function listeStudent(){
        $this->view('listetu.prof');
    }

    function listeAdmin(){
        $this->view('listeAdmin.prof');
    }

	function demande(){
        $this->view('demande.prof');
    }

	function listeProf(){
        $this->view('listeProf.prof');
    }

	function etatDemande(){
        $this->view('demande.etat.prof');
    }

	function notifProfsend(){
        $this->view('notif.send.prof');
    }

    function archProf(){
        $this->view('arch.prof');
    }
    function notifProfget(){
        $this->view('notif.get.prof');
    }
    
	function cour(){
        $this->view('cour.prof');
    }

    function td(){
        $this->view('td.prof');
    }

    function note(){
        $this->view('note.prof');
    }

    function profile($id = null){
        $this->view("profile.prof");
    }
}