<?php

class Archive extends Controller {
    public function index() {
        $courses = Cour::getArchived();
        $dcourses = Cour::getDesarchived();
        $this->view('archive', ['courses' => $courses, 'dcourses' => $dcourses]);
    }
    

    public function archive($id) {
        Cour::archiveById($id);
        $courses = Cour::getArchived();
        $dcourses = Cour::getDesarchived();
        $this->view('archive', ['courses' => $courses, 'dcourses' => $dcourses]);
    }
    public function desarchive($id) {
        Cour::desarchiveById($id);
        $courses = Cour::getArchived();
        $dcourses = Cour::getDesarchived();
        $this->view('archive', ['courses' => $courses, 'dcourses' => $dcourses]);
    }

}
?>