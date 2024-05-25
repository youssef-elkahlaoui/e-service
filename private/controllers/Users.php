<?php

class Users extends Controller
{
	
	function index()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$user = new User();
		$data = $user->query("select * from users where school_id = :school_id ",['school_id'=>$school_id]);

		$this->view('users',['rows'=>$data]);
	}
}