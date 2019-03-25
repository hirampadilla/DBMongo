<?php 
   session_start();
   if(!isset($_SESSION['username']))
       echo '<script>window.location.href="../pages/login.html";</script>';
    if(!$_SESSION['privilage'])
           echo '<script>
            alert("No tienes permisos para entrar a este lugar.");
           window.location.href="../index.php";</script>';
     
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="icon" type="image/png" href="../assets/images/logo.png" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <?php include('nav_bar.php');?>
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Usuarios</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Administrar</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- justified tabs  -->
                        <!-- ============================================================== -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="tab-regular">
                                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Registrar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Buscar</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent7">
                                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                        <!-- ============================================================== -->
                                        <!-- basic form -->
                                        <!-- ============================================================== -->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="status"></div>
                                                <h5 class="card-header">Campos obligatorios (*)</h5>
                                                <div class="card-body">
                                                    <form action="#" id="basicform" data-parsley-validate="">
                                                        <div class="form-group">
                                                            <label for="">Nombre de Usuario*</label>
                                                            <input id="username" type="text" data-parsley-trigger="change" required="" placeholder="Ingresa el nombre de usuario" autocomplete="off" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Contraseña*</label>
                                                            <input id="pass" type="password"  data-parsley-trigger="change" required="" placeholder="password" autocomplete="off" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                                <label>Confirmar Contraseña* <small class="text-muted"><div id="confirm"><p class="alert alert-ligth ">Confirma contraseña</p></div></small></label>
                                                                <input id='pass2'type="password" name="pass2" class="form-control" placeholder="confirm password">
                                                            </div>
                                                        
                                    <br>
                                                        <div class="row">
                                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                                
                                                            </div>
                                                            <div class="col-sm-6 pl-0">
                                                                <p class="text-right">
                                                                    <button id="btn-save" type="submit" class="btn btn-space btn-primary">Guardar</button>
                                                                    <button class="btn btn-space btn-light">Limpiar</button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ============================================================== -->
                                        <!-- end basic form -->
                                        <!-- ============================================================== -->
                                    </div>
                                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                        <div  class="row">
                                            <!-- ============================================================== -->
                                            <!-- basic table  -->
                                            <!-- ============================================================== -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h3 class="card-header">Buscar: <input type="text" id="search" class="form-control col-5" placeholder="Escribe el nombre del Usuario"></h3>
                                                    <h3 class="card-header">Resultados</h3>
                                                    <div class="card-body">
                        
                                                        <div id="table-div" class="table-responsive">
                                                       
                                                            <table class="table table-striped table-bordered first">
                                                             
                                                            <thead>    
                                                            <tr>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="t-body">
                                                                    <tr><td><h3>Iniciar Busqueda</h3>    </td></tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ============================================================== -->
                                            <!-- end basic table  -->
                                            <!-- ============================================================== -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end justified tabs  -->
                        <!-- ============================================================== -->
                    </div>
              
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2019 3DH. Desarrollado por 3DH con <a href="https://getbootstrap.com/">Bootstrap</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(()=>{
            var confirm;
            $('#pass2').change(()=>{
                if($('#pass').val()==$('#pass2').val())
                  {  $('#confirm').html('<div class="alert alert-success">Contraseñas confirmadas</div>');
                     confirm=true;
                  }
                else    {
                    $('#confirm').html('<div class="alert alert-danger">Contraseñas son diferentes</div>');
                    confirm=false;
                }
            });
            $('#btn-save').click(()=>{
                if(confirm){
                    var data={ 
                        usuario : $("#username").val(),
                        contra: $("#pass").val()
                    };
                    $.ajax({
                        type: "post",
                        url: "control/registrar.php",
                        data: data,
                        beforeSend: function(){
                            $(".status").html('<div class="alert-alert-primary" role="primary"><img src="/assets/images/loading.gif">"Procesando, espere un momento...</div>');
                        },
                        success: function (response) {
                                $(".status").html(response);
                        }
                    
                    });
                }
                else{
                    $('.status').html('<div class="alert alert-warning">Aun quedan campos por completar</div>');
                }
                return false;

            });
        });
        /*$(function(e) {
            "use strict";
                $(".phone-inputmask").inputmask("(999) 999-9999"),
                $(".email-inputmask").inputmask({
                    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                    greedy: !1,
                    onBeforePaste: function(n, a) {
                        return (e = e.toLowerCase()).replace("mailto:", "")
                    },
                    definitions: {
                        "*": {
                            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                            cardinality: 1,
                            casing: "lower"
                        }
                    }
                })
        });
        */
    </script>
    <script>
        $("#search").change(()=>{
            $.ajax({
                type: "post",
                url: "control/us_table.php",
                data: {search: $("#search").val()},
                success: function (response) {
                    $("#table-div").html(response);
                }
            });
        });
       
</script>
</body>
 
</html>