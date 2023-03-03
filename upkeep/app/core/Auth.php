<?php

trait Auth{
    public function checkAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            exit;
        }
    }

    public function technicianAuth()
    {
        $this->checkAuth();
        if ($_SESSION['verified'] != false) {
            redirect('Technician/Getverified');
            exit;
        }
    }

    public function checkAdmin()
    {
        $this->checkAuth();
        if ($_SESSION['user_role'] != 'admin') {
            redirect('Home');
            exit;
        }
    }

    public function checkModerator()
    {
        $this->checkAuth();
        if ($_SESSION['user_role'] != 'moderator') {
            redirect('Home');
            exit;
        }
    }


}