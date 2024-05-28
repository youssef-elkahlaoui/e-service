<?php

/**
 * login controller
 */
class Signup extends Controller
{
	
	function index()
	{
		$errors = array();
 		if(count($_POST) > 0)
 		{

 			$user = new Teacher();

 			if($user->validate($_POST))
 			{
 				
 				$_POST['date'] = date("Y-m-d H:i:s");

 				$user->insert($_POST);
 				$this->redirect('Teachers');
 			}else
 			{
 				//errors
 				$errors = $user->errors;
 			}
 		}

		$this->view('signup',[
			'errors'=>$errors,
		]);
	}
}
