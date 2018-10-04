<?php
include_once('template/top-content.php');
?>

<div class="row justify-content-md-center">
    <div class="col-12 col-md-6 choose-map">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Bản đồ:</span>
            </div>
            <select class="custom-select" id="list-map">
                <option value="0" selected>Thế Giới</option>
                <option value="1">U Châu</option>
                <option value="2">Liêu Đông</option>
                <option value="3">Dự Châu</option>
                <option value="4">Thanh Châu</option>
                <option value="5">Từ Châu</option>
                <option value="6">Giang Đông - Dương Châu</option>
                <option value="7">Việt Châu</option>
                <option value="8">Quan Trung - Trung Nguyên</option>
                <option value="9">Bình Châu</option>
                <option value="10">Mông Cổ - Ngoài Cửa Ải</option>
                <option value="11">Dinh Bắc - Kinh Bắc - Kinh Châu</option>
                <option value="12">Dinh Nam - Kinh Nam - Kinh Châu</option>
                <option value="13">Ích Châu</option>
                <option value="14">Lương Châu(trên)</option>
                <option value="15">Lương Châu(dưới)</option>
                <option value="16">Giao Châu</option>
                <option value="17">Lĩnh Nam</option>
                <option value="18">Nhị Châu</option>
                <option value="19">Cao Cư Lệ</option>
                <option value="20">Ngụy Quốc Tà Mã Đài - Ngụy Quốc</option>
                <option value="21">Tiên Giới</option>
                <option value="22">Địa Phủ</option>
                <option value="23">Tây Vực - Tư Lộ</option>
                <option value="24">Tây Vực </option>
                <option value="25">Tây Ninh</option>
                <option value="26">Yên Nhiên</option>
                <option value="27">Nam Trung</option>
            </select>
        </div>
    </div>

    <div class="col-12 col-md-6 choose-map chon-hangdong" style="display: none">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Hang Động:</span>
            </div>
            <select class="custom-select" id="hangdong">
                <option value="default"></option>
            </select>
        </div>
    </div>
</div>

<div class="row justify-content-md-center show-map" >
    <div class="col-12 ">
        <div class="content-map">
            <img src="dist/images/map/FullMaps.jpg" class="content-img" />
        </div>

    </div>
</div>
<img class="img-temp" style="display: none"/>
<?php
include_once('template/bottom-content.php');
?>
