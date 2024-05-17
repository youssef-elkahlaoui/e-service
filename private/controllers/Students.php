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
	
    function absence(){
        $this->view('absence.etu');
    }

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