<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administração da Loja</title>
    <?php 
		echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
		echo link_tag('assets/bower_components/metisMenu/dist/metisMenu.min.css');
		echo link_tag('assets/bower_components/morrisjs/morris.css');
		echo link_tag('assets/bower_components/font-awesome/css/font-awesome.min.css');
		echo link_tag('assets/bower_components/datatables/media/css/jquery.dataTables.min.css');
		echo link_tag('assets/css/sb-admin-2.css');
	?>
	<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bower_components/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/bower_components/flot/jquery.flot.pie.js')?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js') ?>"></script>
</head>
<body>