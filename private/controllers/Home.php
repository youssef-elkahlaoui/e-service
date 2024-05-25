<?php

class Home extends Controller
{

	function index()
	{
		if(Auth::studentLoggedIn())
		{
			$this->redirect("/students");
		}elseif(Auth::teacherLoggedIn()){

		}
		elseif(Auth::adminLoggedIn()){
			$this->redirect("/admins");
		}
		$this->redirect('login');

	}

}
