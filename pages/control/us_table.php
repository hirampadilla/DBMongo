<?php 
    namespace control;
    include('Usuario.php');

    $search = $_POST['search'];
    $user = new Usuario();
    $modalEdit=null;
    $response = $user->findPattern($search);
    $result=null;
    $altable='
            <table class="table table-striped table-bordered first">
                         
                        <thead>    
                        <tr>
                                    <th>Nombre de Usuario</th>
                                    <th>Privilegio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
    $downtable='</tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre de Usuario</th>
                                    <th>Privilegio</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>';
    $Alltable=$altable;

    foreach($response as $us){
        
        $admin="Basico";
        if($us->privilage) 
            $admin="Administrador";
            $result .= '<tr>
            <td>'.$us->username->name.'</td>
            <td>'.$admin.'</td>
            <td>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-'.$us->username->name.'-edit">Editar</button>
                <button class="btn btn-sm btn-danger">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
            </tr>';
            $modalEdit.='<!-- Modal -->
            <div class="modal fade" id="modal-'.$us->username->name.'-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario: '.$us->username->name.'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-control">
                    <h6 class="card-header">Nombre de Usuario: <input type="text" class="form-control" value="'.$us->username->name.'"></h6>
                    <h6 class="card-header">Cambiar Contraseña: <input type="password" class="form-control" ></h6>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div><script>
            $("#modal").on("shown.bs.modal", function () {
                $("#modal-'.$us->username->name.'-edit").trigger("focus")
              })
            </script>';
#<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
#Launch demo modal
#</button>
    }
    if(!is_null($result)){
        $Alltable=$altable.$result.$downtable.$modalEdit;
        echo $Alltable;
    }
    else {   
        $Alltable=$altable.'<tr><td>No existen Registros</td></tr>'.$downtable;
        echo $Alltable;
    }
?>