<?php 
namespace control;
    include('Usuario.php');
    $username=$_POST['usuario'];
    $pass=$_POST['contra'];
    $user = new Usuario();

    if( $user->SetUser($username,$pass))
        echo "done";
    $result= $user->findUser([]);// para buscar todos los usuarios 
                                 // se debe poner un json o n caso de buscar todos poner [] vacio
    print_r($result);
    echo "<br>";
    foreach($result as $us){
        echo "<br>".$us['username']->name . " ".$us['pass'];
    }
    if($user->login('Diana','123'))
        echo "Existe usuario Contraseña Correcta";
    else echo "Contraseña incorrecta";

    // prueba update
     $newUsuario=[
        "name"=>"Diana",
        "pass"=>"123"
    ];
    
    if($user->destroy("Diana"))
    echo "Eliminado";
?>