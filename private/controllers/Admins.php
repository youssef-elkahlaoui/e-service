<?php 
require_once 'Demandes.php';
require_once 'Seenotifications.php';
require_once 'Allnotification.php';

class Admins extends Controller {

    function index() {
        if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $user = new Admin();
        $data = $user->findAll();
        $this->view('home.admin', ['rows' => $data]);
    }

    function getAllAdmins() {
        $adminModel = new Admin();
        $admins = $adminModel->findAll(); 
        $this->view('listeAdmin.admin', ['admins' => $admins]);
    }
    function getAllProfs() {
        $teacherModel = new Teacher();
        $teachers = $teacherModel->findAll(); 
        $this->view('listeProf.admin', ['teachers' => $teachers]);
    }
    function getAllstudents(){
        $studentModel = new Student();
        $student = $studentModel->findAll();
        $this->view('listeStudents.admin',['students'=>$student]);
    }
    function notifAdminsend(){
        $this->view('SendNotification');
    }
    
    function ajouterUser(){
        $this->view('AjouterUser');
    }

    function getDemandes() {
        $demandesController = new Demandes();
        $demandes = $demandesController->demande();
        $this->view('demandes.admin', ['demandes' => $demandes]);
    }
    
    function archivenotif(){
        $arch = new Allnotification();
        $result = $arch->allnotifications();
        $this->view('seenotifications.admin',['result' => $result]);
    }

    function archProf() {
        $this->view('archprof');
    }



    function profile($id = null) {
        $this->view("profile.admin");
    }
    function importusers(){
        $this->view('ImportUsers');
    }

    
}
?>
