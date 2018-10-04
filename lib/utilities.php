<?php
    function getColorByHeroType($type) {
        switch($type){
            case "H" :	
                return "red";		
                break;
            case "P" :	
                return "green";		
                break;
            case "T" :	
                return "blue";		
                break;
            case "D":	
                return "brown";		
                break;
            default:
                return "";
        }
    }

    function renderHeroTypeOption($heroType) {
        $typeList = ["H","T","D","P"];

        $classForm = $heroType === '' ? "warning" : "";
        $rst = '<select class="form-control '.$classForm.'" name="He">';
        
        foreach ($typeList as $type) {
            if ($heroType === $type)
                $rst .= '<option selected value="' .$type. '">' .$type. '</option>';
            else
                $rst .= '<option value="'.$type.'">'.$type.'</option>';
        }
        $rst .= '</select>';
        return $rst;
    }

    function renderHeroKTType($conn, $ktType) {
        $KTTypeList = DanhSachLoai($conn);

        $rst = '<select class="form-control js-drop-image kt-type-option" name="idLoai">';
        while ($row_KT = mysqli_fetch_array($KTTypeList)) {
            if ($ktType === $row_KT['idLoai'])
                $rst .= '<option selected value="'.$row_KT['idLoai'].'" data-image="/dist/images/KT/'.$row_KT['HinhAnh'].'")">Loại : '.$row_KT['idLoai'].'</option>';
            else
                $rst .= '<option value="'.$row_KT['idLoai'].'" data-image="/dist/images/KT/'.$row_KT['HinhAnh'].'")>Loại : '.$row_KT['idLoai'].'</option>';
        }

        return $rst;
    }

    function renderHeroKT($conn, $heroKT) {
        $KTTypeList = getAllKTList($conn);

        $rst = '<select class="form-control js-drop-image hero-kt-option" name="idKT">';
        while ($row_KT = mysqli_fetch_array($KTTypeList)) {
            if ($heroKT === $row_KT['idKT'])
                $rst .= '<option selected value="'.$row_KT['idKT'].'" data-image="/dist/images/KT/'.$row_KT['idKT'].'.png")"></option>';
            else
                $rst .= '<option value="'.$row_KT['idKT'].'" data-image="/dist/images/KT/'.$row_KT['idKT'].'.png")></option>';
        }

        return $rst;
    }

    function getAllKTList($conn) {
        $qr = "
        SELECT DISTINCT idKT FROM kt
        ";
        return mysqli_query($conn, $qr);
    }
    
    function UpdateHeroData($conn, $idPet, $TenTQ, $TenVN, $idLoai, $idKT, $He, $MoTa, $HinhAnh) {
        try {
            $qr = "
                UPDATE kt
                SET TenTQ = '$TenTQ', 
                    TenVN = '$TenVN',
                    idLoai = '$idLoai',
                    idKT = '$idKT',
                    He = '$He',
                    Mota = '$MoTa',
                    HinhAnh = '$HinhAnh'
                WHERE idPet=$idPet
            ";
            return mysqli_query($conn, $qr);
        } catch(Exception $e) {
            return $e;
        }
    }
?>