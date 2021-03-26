<?php
require_once("../core/class.Conexion.php");
$db = new Conexion();
$id = $_GET['id'];
$type = $_GET['type'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Editar publciacion">
    <meta name="author" content="NibusWeb">


    <!-- Title Page-->
    <title>Editar</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php include('view/sidebar.php') ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include('view/header.php'); ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Editar</strong> publicación:
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="publishForm" class="form-horizontal">
                                        <?php
                                            if($type=='news'){
                                                $sql = $db->query("SELECT * FROM news WHERE id='$id';");
                                                $row = $db->recorrer($sql);
                                                $cuerpo = $row['cuerpo'];
                                                $cuerpo = str_replace('<br />', '', $cuerpo); 
                                        ?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Título:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input value="<?php echo $row['titulo'] ?>" type="text" required id="text-input" name="titulo" placeholder="Titulo" class="form-control">
                                                    <small class="form-text text-muted">Ingrese el titulo aquí.</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Desripción:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input value="<?php echo $row['desc_c'] ?>" type="text" id="email-input" required name="desc_c" placeholder="Descripción..." class="form-control">
                                                    <small class="help-block form-text">Ingrese una descripción corta.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Cuerpo:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="cuerpo" required id="textarea-input" rows="9" placeholder="Contenido..." class="form-control"><?php echo $cuerpo ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ident" value="<?php echo $id ?>">
                                            <input type="hidden" name="modo" value="<?php echo $type ?>">
                                            <?php $db->liberar($sql); }else{
                                                $sql = $db->query("SELECT * FROM videos WHERE id_v='$id';");
                                                $row = $db->recorrer($sql);

                                                ?>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Link:</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input value="<?php echo $row['link'] ?>" type="text" required id="text-input" name="link" placeholder="" class="form-control">
                                                        <small class="form-text text-muted">Ingrese el link aquí.</small>
                                                    </div>
                                                </div>
                                                 <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Descripción:</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input value="<?php echo $row['descripcion'] ?>" type="text" required id="text-input" name="desc" placeholder="" class="form-control">
                                                        <small class="form-text text-muted">Ingrese una descripción aquí.</small>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ident" value="<?php echo $id ?>">
                                                <input type="hidden" name="modo" value="<?php echo $type ?>">
                                            <?php } ?>
                              
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="publicar" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Publicar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    <div id="mensaje"></div>
                                    <
                                    </form>
                                </div>
                                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 NibusWeb. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
$(document).ready(function(){
       $("#publishForm").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../core/actions/goEdit.php',
            data: $(this).serialize(),
            success: function(res){
                alert(res);
                location.href = 'index.php?s=list'
            
            }
            });

        return false;
    });
});
    </script>

</body>

</html>
<!-- end document-->
