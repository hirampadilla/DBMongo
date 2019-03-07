<?php 
namespace control;
include('Usuario.php');

$user=$_POST['user'];
$pass=$_POST['pass'];
$us_control= new Usuario();

if($us_control->login($user,$pass)){
    session_start([
        'cookie_lifetime' => 86400,
    ]);
    $_SESSION['username']=$user;
    echo '<div id="result" role="success" class="alert alert-success"> Usuario correcto, espera un momento...</div>';
}
else   
    echo '<div id="result" role="danger" class="alert alert-danger"> Usuario Incorrecto no coinciden</div>';


?>