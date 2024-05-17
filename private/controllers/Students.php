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
	
    function absence(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
        $this->view('absence.etu');
    }

	function classe(){
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
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
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
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
        if(!Auth::studentLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Student();

		$data = $user->findAll();
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