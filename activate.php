<?php

session_start();
include 'config.php'; 
$data = new Config();
if(isset($_GET['token']))
{
    $token = $_GET['token'];

    $query = "update tb_user set active = '1' where token = '$token' ";
    $q = mysqli_query($con, $query);
    if($q)
    {
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account Updated ";
            header('location:login.php');
        }
        else{
            $_SESSION['msg'] = "Account not updated";
            header('location:account.php');
        }
    }
}

?>