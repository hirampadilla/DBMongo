<?php 
namespace control;
include('Usuario.php');
$username=$_POST['usuario'];
$pass=$_POST['contra'];

$user = new Usuario();
$user->SetUser($username,$pass);

echo "done";
?>