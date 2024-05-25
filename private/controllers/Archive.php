<?php

class Archive extends Controller {
    public function index() {
        $dcourses = Cour::getArchived();
        $courses = Cour::getDesarchived();
        $this->view('archive', ['courses' => $courses, 'dcourses' => $dcourses]);
    }
    public function archive($id) {
        Cour::archiveById($id);
        $this->index();
    }
    public function desarchive($id) {
        Cour::desarchiveById($id);
        $this->index();
    }
}
?>