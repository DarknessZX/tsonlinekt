<?php
    require "../lib/connection.php";
    require "../lib/function.php";
    require "../lib/utilities.php";
    

    $idPet = $_POST["idPet"];
    $TenTQ = $_POST["TenTQ"];
    $TenVN = $_POST["TenVN"];
    $idLoai = $_POST["idLoai"];
    $idKT = $_POST["idKT"];
    $He = $_POST["He"];
    $MoTa = $_POST["MoTa"];
    $HinhAnh = $_POST["HinhAnh"];

    echo UpdateHeroData($conn, $idPet, $TenTQ, $TenVN, $idLoai, $idKT, $He, $MoTa, $HinhAnh);
?>