<?php
include_once('template/top-content.php');
?>
<div class="row justify-content-md-center">
    <div class="col-12 col-md-6">
        <input hidden id="type_search" value="0">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button" id="lang_search">VN</button>
            </div>
            <input type="text" class="form-control inputSearch" placeholder="Tìm kiếm tướng" aria-label="Tìm kiếm tướng"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary btnSearch" type="button">Tìm Kiếm</button>
            </div>
        </div>
    </div>
</div>
<div class="row content1">
    <div class="col-12 col-md-9">
        <h4 >Kim Tỏa:</h4>
        <?php
        $Loai = danhSachLoai($conn);
        while ($row_Loai = mysqli_fetch_array($Loai)) {
            ?>
            <div id="<?php echo $row_Loai['idLoai'] ?>" class="KT col-6 col-md-3">
                <img src="/dist/images/KT/<?php echo $row_Loai['HinhAnh'] ?>">
            </div>
            <?php
        }
        ?>

    </div>

    <div class="col-12 col-md-3 ">
        <br class="d-block d-sm-block d-md-none">
        <h4 id="pet">Tướng:</h4>
        <div class="list_kimtoa">

        </div>

    </div>
</div>

<?php
include_once('template/bottom-content.php');
?>
