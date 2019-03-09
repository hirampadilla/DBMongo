<?php 
    namespace control;
    include('Usuario.php');

    $search = $_POST['search'];
    $user = new Usuario();
    $response = $user->findPattern($search);
    $result=null;

    foreach($response as $us){
        $result .= '<tr>
        <td>el Dariuzcm</td>
        <td>admin</td>
        <td>
            <button onClick="editar('.$us->username->name.');" class="btn btn-sm btn-success">Editar</button>
            <button class="btn btn-sm btn-danger" onClick="delete('.$us->username->name.');">
                <i class="far fa-trash-alt"></i>
            </button>
        </td>
    </tr>';
    }
    if(!is_null($result))
        echo $result;
    else    
        echo "No existen Registros";

?>