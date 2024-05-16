<?php
class Login extends Controller
{
	
	function index()
	{
		$errors = array();
		auth::logout();

		if(count($_POST) > 0)
		{

			$patternEtu = '/^[a-z]+\.[a-z]+@etu\.com$/i';
			$patternTeach = '/^[a-z]+\.[a-z]+@prof\.com$/i';
			$patternAdmin = '/^[a-z]+\.[a-z]+@admin\.com$/i';
			$EMAIL=$_POST['email'];
			if (preg_match($patternEtu,$EMAIL)) {
				$user = new Student();
				if($row = $user->where('email',$EMAIL))
				{
					$row = $row[0];
					if(password_verify($_POST['password'], $row->password))
					{
					Auth::authenticateStudent($row);
						if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
							setcookie('remembered', 'true', time() + (86400 * 30), '/'); 
						}
						$this->redirect('/students');
					}
				}
			}
			elseif (preg_match($patternTeach,$EMAIL)) {
				$user = new Teacher();
				if($row = $user->where('email',$EMAIL))
				{
					$row = $row[0];
					if(password_verify($_POST['password'], $row->password))
					{
					Auth::authenticateTeacher($row);
						if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
							setcookie('remembered', 'true', time() + (86400 * 30), '/'); 
						}
						$this->redirect('/teacher');
					}
				}
			}
			elseif (preg_match($patternAdmin,$EMAIL)) {
				$user = new Admin();
				if($row = $user->where('email',$EMAIL))
				{
					$row = $row[0];
					if(password_verify($_POST['password'], $row->password))
					{
					Auth::authenticateAdmin($row);
						if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
							setcookie('remembered', 'true', time() + (86400 * 30), '/'); 
						}
						$this->redirect('/admin');
					}
				}

			}
			$errors['email'] = "Wrong email or password";
		}
		$this->view('login',[
			'errors'=>$errors,
		]);
	}
}
