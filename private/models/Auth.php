<?php

/**
 * Authentication class
 */
class Auth
{
	
	public static function authenticateAdmin($row) {
        $_SESSION['ADMIN'] = $row;
    }

    public static function authenticateStudent($row) {
        $_SESSION['STUDENT'] = $row;
    }

    public static function authenticateTeacher($row) {
        $_SESSION['TEACHER'] = $row;
    }

	public static function logout() {
        if (isset($_SESSION['ADMIN'])) {
            unset($_SESSION['ADMIN']);
        }
        if (isset($_SESSION['STUDENT'])) {
            unset($_SESSION['STUDENT']);
        }
        if (isset($_SESSION['TEACHER'])) {
            unset($_SESSION['TEACHER']);
        }
    }


	public static function adminLoggedIn() {
		if (isset($_SESSION['ADMIN'])) {
			return true;
		}
		return false;
	}

	public static function studentLoggedIn() {
		if (isset($_SESSION['STUDENT'])) {
			return true;
		}
		return false;
	}

	public static function teacherLoggedIn() {
		if (isset($_SESSION['TEACHER'])) {
			return true;
		}
		return false;
	}

	

	public static function user()
	{
		if(isset($_SESSION['USER']))
		{
			return $_SESSION['USER']->firstname;
		}

		return false;
	}

	public static function __callStatic($method,$params)
	{
		$prop = strtolower(str_replace("get","",$method));

		if(isset($_SESSION['USER']->$prop))
		{
			return $_SESSION['USER']->$prop;
		}

		return 'Unknown';
	}
	
}