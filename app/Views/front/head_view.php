<!DOCTYPE html>
<html>
    <head>
        <!-- Carga Animate.css desde CDN para animaciones CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <!-- Ícono de la pestaña del navegador -->
        <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/x-icon">
        
        <!-- Bootstrap CSS principal (estilos de diseño responsive) -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
       
        <!-- Tu hoja de estilos personalizada -->
        <link href="<?= base_url('assets/css/miestilo.css') ?>" rel="stylesheet">
        
        <!-- Bootstrap Bundle con JavaScript y Popper -->
        <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
        
        <!-- Título dinámico de la página -->
        <title><?php echo($titulo);?></title>
    </head>