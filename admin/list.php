<?php
require_once("../core/class.Conexion.php");
$db = new Conexion();

?>
<!DOCTYPE html>
<html lang="es">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Listado de publicaciones">
    <meta name="author" content="Nibus Web">

    <!-- Title Page-->
    <title>Lista de publicaciones</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
    <link rel="stylesheet" href="../css/contact-form.css" type="text/css" media="all"> 

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
            <div id="respuesta" style="display: none;"></div>
            <!-- HEADER DESKTOP-->
            <?php include('view/header.php'); ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                
                                <!--  <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="publish">
                                            <i class="zmdi zmdi-plus"></i>Publicar</button>
                                        
                                    </div>
                                </div>-->
                                <h3 class="title-5 m-b-35">Lista de publicaciones</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>Titulo</th>
                                                
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = $db->query("SELECT * FROM news");
                                                if($db->rows($sql)>0){
                                                  while($row = $db->recorrer($sql)){ 
                                                  $fecha = date_create($row['fecha']);
                                            ?>
                                            <tr class="tr-shadow">
                                                <td class="titulo"><?php echo $row['titulo'] ?></td>
                                                
                                                <td class="desc" id="desc"><?php echo $row['desc_c'] ?></td>
                                                <td id="fecha"><?php echo $row['fecha'] ?></td>
                                                <td>
                                                    <?php if($row['visible']==1){?>
                                                    <span class="status--process" status="v" id="status" code="<?php echo $row['id'] ?>">Visible</span><?php }else{ ?>
                                                    <span class="status--denied" status="h" id="status" code="<?php echo $row['id'] ?>" >Oculto</span><?php } ?>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <?php if($row['visible']==1){?>
                                                        <button class="item hide" modo="news" status="v" id="<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Ocultar">
                                                            <i class="zmdi zmdi-eye-off"></i>
                                                        </button><?php }else{ ?>
                                                        <button class="item hide" modo="news" status="h" id="<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Mostrar">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button><?php } ?>
                                                        
                                                        
                                                        <button class="item edit" modo="news" id="<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item delete" modo="news" data-toggle="tooltip" data-placement="top" id="<?php echo $row['id'] ?>" title="Eliminar">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item ver" modo="news" id="<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 

                                                }
                                            }
                                            $db->liberar($sql)

                                             ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- END DATA TABLE -->

                                <h3 class="title-5 m-b-35" style="margin-top: 25px;">Lista de videos</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>ID</th>
                                                
                                                <th>Link</th>
                                                <th>Descripcion</th>
                                                <th>Imagen</th>
                                                <th>Visible</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = $db->query("SELECT * FROM videos");
                                                if($db->rows($sql)>0){
                                                  while($row = $db->recorrer($sql)){ 
                                                  
                                            ?>
                                            <tr class="tr-shadow">
                                                <td class="titulo"><?php echo $row['id_v'] ?></td>
                                                
                                                <td class="desc" id="desc"><?php echo $row['link'] ?></td>
                                                <td id="fecha"><?php echo $row['descripcion'] ?></td>
                                                <td><img src="<?php echo $row['img'] ?>" alt="" style="width: 250px;"></td>
                                                <td>
                                                    <?php if($row['visible']==1){?>
                                                    <span class="status--process" status="v" id="status" code="<?php echo $row['id_V'] ?>">Visible</span><?php }else{ ?>
                                                    <span class="status--denied" status="h" id="status" code="<?php echo $row['id_v'] ?>" >Oculto</span><?php } ?>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <?php if($row['visible']==1){?>
                                                        <button class="item hide" modo="video" status="v" id="<?php echo $row['id_v'] ?>" data-toggle="tooltip" data-placement="top" title="Ocultar">
                                                            <i class="zmdi zmdi-eye-off"></i>
                                                        </button><?php }else{ ?>
                                                        <button class="item hide" modo="video" status="h" id="<?php echo $row['id_v'] ?>" data-toggle="tooltip" data-placement="top" title="Mostrar">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button><?php } ?>
                                                        
                                                        
                                                        <button class="item edit" modo="video" id="<?php echo $row['id_v'] ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item delete" modo="video" data-toggle="tooltip" data-placement="top" id="<?php echo $row['id_v'] ?>" title="Eliminar">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item ver" modo="video" id="<?php echo $row['id_v'] ?>" data-toggle="tooltip" data-placement="top" title="Ver">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 

                                                }
                                            }
                                            $db->liberar($sql)

                                             ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- END DATA TABLE -->


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
    <script src="js/list.js"></script>

</body>

</html>
<!-- end document-->
