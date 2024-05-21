<?php
require_once __DIR__ . '/Seenotifications.php';

class Admins extends Controller {
    public function index() {
        if (!Auth::adminLoggedIn()) {
            $this->redirect('login');
        }

        $user = new Admin();
        $data = $user->findAll();

        // Fetch notifications
        $seenotifications = new Seenotifications();
        $notifications = $seenotifications->scroll();

        // Pass both user data and notifications to the view
        $this->view('home.admin', ['rows' => $data, 'notifications' => $notifications]);
    }
}

?>