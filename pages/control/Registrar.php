<?php 
namespace control;
    include('Usuario.php');
    $username=$_POST['usuario'];
    $pass=$_POST['contra'];
    $user = new Usuario();

    if( $user->SetUser($username,$pass))
        echo "<div class='alert alert-success'> Usuario Registrado Exitosamente</div>";
    else
        echo "<div class='alert alert-warning'> Es posble que el usuario ya exista</div>";
?>
