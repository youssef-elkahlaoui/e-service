<?php 

class Teachers extends Controller
{

    function index()
	{
        		// code...
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

	function classe(){
        $this->view('classe.etu');
    }

	function demande(){
        $this->view('demande.prof');
    }

	function note(){
        $this->view('note.prof');
    }

	function listeProf(){
        $this->view('listeProf');
    }

	function etatDemande(){
        $this->view('demande.etat.prof');
    }

	
    function documentation(){
        $this->view('documentation.prof');
    }

	function devoir(){
        $this->view('devoir.prof');
    }
    
    function modules(){
        $this->view("modules");
    }

    function profile($id = null){
        $this->view("profile");
    }
}