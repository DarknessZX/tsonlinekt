<?php
function danhSachLoai($conn){
    $qr = "
	SELECT * FROM loai
	";
    return mysqli_query($conn, $qr);
}

function danhSachKTTheoLoai($conn,$idLoai){
    $qr = "
	SELECT * FROM kt
	WHERE idLoai = $idLoai ORDER BY idKT ASC
	";
    return mysqli_query($conn, $qr);
}

function searchPet($conn,$Keyword,$Type){
    $qr = "
	SELECT * FROM kt
	WHERE $Type like '%$Keyword%' ORDER BY idKT ASC
	";
    return mysqli_query($conn, $qr);
}

function HePhai($he){
    switch ($he){
        case 'H': return "Hoa";
        case 'P': return "Phong";
        case 'T': return "Thuy";
        case 'D': return "Dia";
        default: return "ChuaXacDinh";
    }
}

function HePhaiImages($he){
    switch ($he){
        case 'H': return "<img src='/dist/images/menu/hoa.png' class='loai-he' />";
        case 'P': return "<img src='/dist/images/menu/phong.png' class='loai-he' />";
        case 'T': return "<img src='/dist/images/menu/thuy.png' class='loai-he' />";
        case 'D': return "<img src='/dist/images/menu/dia.png' class='loai-he' />";
        default: return "Chưa xác định";
    }
}

function TimKiemWithPaging($conn,$Keyword,$Type, $page){
	$start = ($page-1) * 30;
	$end = $start + 20;
	$qr = "
	SELECT * FROM kt
	WHERE $Type LIKE '%$Keyword%' ORDER BY idKT ASC
	LIMIT $start, $end
	";
	return mysqli_query($conn, $qr);
}

function TimKiemLoi($conn, $page) {
	$start = ($page-1) * 30;
	$end = $start + 20;
	$qr = "
	SELECT * FROM kt
	WHERE He = '' ORDER BY idKT ASC
	LIMIT $start, $end
	";
	return mysqli_query($conn, $qr);
}
?>