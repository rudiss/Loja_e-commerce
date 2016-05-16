<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Administração da loja</span>
        </div>
        <ul class="nav navbar-top-links navbar-right">                
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url("administracao/logout") ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="<?php echo base_url("administracao/clientes") ?>"><i class="fa fa-wrench fa-fw"></i> Clientes</a></li>
                    <li><a href="<?php echo base_url("administracao/categorias") ?>"><i class="fa fa-wrench fa-fw"></i> Categorias</a></li>
                    <li><a href="<?php echo base_url("administracao/produtos") ?>"><i class="fa fa-wrench fa-fw"></i> Jogos</a></li>
                    <li><a href="<?php echo base_url("administracao/pedidos") ?>"><i class="fa fa-wrench fa-fw"></i> Pedidos</a></li>
                    <li><a href="<?php echo base_url("administracao/transportadoras") ?>"><i class="fa fa-wrench fa-fw"></i> Fretes</a></li>
                    <li><a href="<?php echo base_url("administracao/usuarios") ?>"><i class="fa fa-wrench fa-fw"></i> Usuários</a></li>
                </ul>
            </div>
        </div>
    </nav>