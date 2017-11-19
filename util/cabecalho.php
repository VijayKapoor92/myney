<?php
ini_set("display_errors","on");
date_default_timezone_set("America/Sao_Paulo");

include_once "ControleAcesso.php";

$ca = new ControleAcesso();
$ca->verificarLogado();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="library/bootstrap4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="library/font-awesome/css/font-awesome.min.css" />
</head>
<body>