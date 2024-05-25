<?php 

class Admins extends Controller
{
    function index(){
		if(!Auth::adminLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Admin();

		$data = $user->findAll();

		$this->view('home.admin',['rows'=>$data]);
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

	function notifAdminsend(){
        $this->view('SendNotification');
    }

    function archProf(){
        $this->view('arch.prof');
    }

    function notifProfget(){
        $this->view('notif.get.prof');
    }

    function profile($id = null){
        $this->view("profile.admin");
    }
	
}
