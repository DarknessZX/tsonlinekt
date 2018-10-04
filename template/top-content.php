<?php
    include_once 'lib/connection.php';
    include_once 'lib/function.php'

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/dist/css/dd.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/style.css">

    <title><?php echo isset($headTitle)?$headTitle: "Tsonline support" ?></title>
</head>
<body>
<div class="container ">
    <img src="./dist/images/menu/banner.png" class="background">
</div>

<div class="fix-sidebar"></div>
<div class="sidebar-mobile"></div>
<div class="container clearfix">
    <div class="clearfix main-nav">
            <a href="/" class="nav-item">Trang Chủ</a>
            <a href="/kimtoa.php" class="nav-item">Kim Tỏa</a>
            <a  class="nav-item " alt="coming soon">Tướng tinh </a>
            <a  class="nav-item " alt="coming soon">Bản Đồ </a>
            <a  class="nav-item " alt="coming soon">Tướng </a>
            <a  class="nav-item " alt="coming soon">Skills </a>
    </div>
</div>
<div class="clearfix"></div>
<div class="container<?=isset($edit) ? "-fluid": ""?>">


