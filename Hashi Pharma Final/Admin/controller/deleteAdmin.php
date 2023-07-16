<?php 

require_once '../model/adminmodel.php';

if (deleteAdmin($_GET['id'])) {
    header('Location: ../view/adminlist.php');
}

 ?>