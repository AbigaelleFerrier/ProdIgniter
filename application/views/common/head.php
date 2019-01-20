<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $titre ?> - FatyConcept fabriquant & distributeur Stickers-Patch</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo css_url('materialize');?>"  media="screen,projection"/>
    <!-- <link type="text/css" rel="stylesheet" href="assets/css/nouislider.css"> -->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="fr" />
    <meta name="author" lang="fr" content="Asheart">

    <!-- JS -->

    <script type="text/javascript" href="<?php echo js_url('nouislider');?>"></script>
    <script
      src="http://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>

</head>

<body>
  <?php
      $this->load->view('modal/categorieMdl');
      $this->load->view('common/nav');
  ?>
