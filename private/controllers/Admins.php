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
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $adminModel = new Admin();
        $admins = $adminModel->findAll(); 
        $this->view('listeAdmin.admin', ['admins' => $admins]);
    }
    function getAllProfs() {
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $teacherModel = new Teacher();
        $teachers = $teacherModel->findAll(); 
        $this->view('listeProf.admin', ['teachers' => $teachers]);
    }
    function getAllstudents(){
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $db = new Database(); // Create an instance of the Database class
        $query = "SELECT students.*, classes.NomClasse AS NomFiliere 
                  FROM students 
                  INNER JOIN classes ON students.IdClasse = classes.IdClasse";
        $students = $db->query($query);
        $this->view('listeStudents.admin', ['students' => $students]);
    }

    function notifAdminsend(){
    if(!Auth::adminLoggedIn()) {
        $this->redirect('login');
    }
    $classe = new Classe(); 
    $classes= $classe->findAll(); 
    $this->view('SendNotification',['classes'=>$classes]);
}

    

    function getDemandes() {
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $demandesController = new Demand();
        $demandes = $demandesController->findAll();
        $this->view('demandes.admin', ['demandes' => $demandes]);
    }

    
    function archivenotif(){
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $arch = new Allnotification();
        $result = $arch->allnotifications();
        $this->view('seenotifications.admin',['result' => $result]);
    }

    function profile($id = null) {
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $this->view("profile.admin");
    }
    function importusers(){
         if(!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }
        $this->view('ImportUsers');
    }

    
}
?>
