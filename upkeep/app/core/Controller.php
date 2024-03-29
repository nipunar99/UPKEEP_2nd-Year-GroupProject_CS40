<?php

trait Controller
{ // this is a super class. it is extended by all controllers

    public function view($name, $data = [])
    {
        if (isset($_SESSION['USER'])) {
            $data['userdata'] = $_SESSION['USER'];
        }

        if (!empty($data)) extract($data);
        $fileName = "../app/views/" . $name . ".view.php";
        if (file_exists($fileName)) {
            require $fileName;
        } else {
            $fileName = "../app/views/404.view.php";
            require $fileName;
        }
    }

    public function viewHtml($name, $data = [])
    {
        if (!empty($data)) extract($data);
        $fileName = "../app/views/" . $name . ".view.html";
        if (file_exists($fileName)) {
            require $fileName;
        } else {
            $fileName = "../app/views/404.view.html";
            require $fileName;
        }
    }
}
