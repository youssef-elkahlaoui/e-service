<?php 

class Admins extends Controller
{
    function index()
	{
		if(!Auth::adminLoggedIn())
		{
			$this->redirect('login');
		}
		$user = new Admin();

		$data = $user->findAll();

		$this->view('home.admin',['rows'=>$data]);
    }
	
}
