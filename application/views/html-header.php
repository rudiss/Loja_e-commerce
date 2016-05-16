<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Fox Games.</title>
    <?php
        echo meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')) .
        meta(array('name' => 'description', 'content' => 'Fox Games. Descrição completa da loja aqui.')) .
        link_tag('assets/css/bootstrap.min.css') .
        link_tag('assets/css/bootstrap-responsive.min.css') .
        link_tag('assets/css/estilos.css');
    ?>
    <script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mask.js');?>"></script>
</head>
<body>