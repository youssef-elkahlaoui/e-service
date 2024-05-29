<?php
class Logout extends Controller
{
    function index()
    {
        header('Cache-Control: no-cache, no-store, must-revalidate'); 
        header('Pragma: no-cache');
        header('Expires: 0');

        Auth::logout();
        session_destroy();

        $this->redirect('login');
    }
}
