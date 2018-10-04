<?php
include_once '../lib/connection.php';
include_once '../lib/function.php'
?>
<?php
$idLoai = $_GET["idLoai"];settype($idLoai,"int");
$KT = danhSachKTTheoLoai($conn,$idLoai);
while($row_KT = mysqli_fetch_array($KT)){
    ?>
    <div class="pet <?php echo HePhai($row_KT['He']) ?>" data-id="<?php echo $row_KT['idPet']?>"
         data-img="<?php
         $link = "../dist/images/Pet/". $row_KT['HinhAnh'];
         $linkInPage= "./dist/images/Pet/". $row_KT['HinhAnh'];
            if (file_exists($link)){
                echo "<img src='".$linkInPage."' class='images-pet img-fluid' />";
            }else{
                echo 0;
            }

         ?>"
         data-TQ="<?php echo $row_KT['TenTQ']?>"
         data-VN="<?php echo $row_KT['TenVN']?>"
         data-noibat="<?php echo $row_KT['MoTa']?>"
         data-kt="<?php echo $row_KT['idKT']?>"
         data-he="<?php echo HePhaiImages($row_KT['He']); ?>">
        <div class="row">
            <div class="col-12">
                <div class="row img-kt">
                    <div class="col-4">
                        <img src="./dist/images/KT/<?php echo $row_KT['idKT']?>.png">
                    </div>
                    <div class="col-8">
                        <div class="row"><?php echo $row_KT['TenTQ']?></div>
                        <div class="row"><?php echo $row_KT['TenVN']?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>