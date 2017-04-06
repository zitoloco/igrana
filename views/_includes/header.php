<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
// Verifica se o usuário está logado
if ( ! $this->logged_in ) {

	// Se não; garante o logout
	$this->logout();
	
	// Redireciona para a página de login
	$this->goto_login();
	
	// Garante que o script não vai passar daqui
	return;

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Robison Puglielli">

        <link rel="shortcut icon" href="<?php echo HOME_URI;?>/views/assets/images/favicon_1.ico">

        <title>iGrana - Gerencie suas contas com facilidade.</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo HOME_URI;?>/views/assets/plugins/morris/morris.css">

        <!-- Plugins css-->
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

		<!-- DataTables -->
    	<link href="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    	<link href="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom box css -->
        <link href="<?php echo HOME_URI; ?>/views/assets/plugins/custombox/css/custombox.css" rel="stylesheet">

        <link href="<?php echo HOME_URI;?>/views/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOME_URI;?>/views/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery  -->
        <script src="<?php echo HOME_URI;?>/views/assets/js/jquery.min.js"></script>
        <script src="<?php echo HOME_URI;?>/views/assets/js/bootstrap.min.js"></script>

        <!-- JQuery Mask JS! -->
        <script src="<?php echo HOME_URI;?>/views/assets/js/jquery.mask.min.js"></script>

        <script src="<?php echo HOME_URI;?>/views/assets/js/modernizr.min.js"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="<?php echo HOME_URI; ?>" class="logo">
                        	<span style="text-transform: none;"> i<strong class="text-success">Grana</strong> </span>
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="navbar-c-items">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Pesquisar..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li class="dropdown navbar-c-items">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
                                	<img src="<?php echo HOME_URI.'/views/_uploads/'.$this->userdata['user_photo']; ?>" alt="user-img" class="img-circle"> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user text-custom m-r-10"></i> Meu perfil</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings text-custom m-r-10"></i> Configurações</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock text-custom m-r-10"></i> Bloquear tela</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo HOME_URI; ?>/logout"><i class="ti-power-off text-danger m-r-10"></i> Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="<?php echo HOME_URI; ?>"><i class="md md-dashboard"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-account-circle"></i>Cadastros</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo HOME_URI; ?>/cliente"> Clientes </a></li>
                                    <li><a href="<?php echo HOME_URI; ?>/fornecedor"> Fornecedores </a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-folder-special"></i>Contas</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo HOME_URI; ?>/receber">Contas à receber</a></li>
                                            <li><a href="<?php echo HOME_URI; ?>/pagar">Contas à pagar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End navigation menu        -->
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">