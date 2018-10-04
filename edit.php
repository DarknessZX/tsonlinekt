<?php
    $edit = true;
    include('template/top-content.php');
    include_once('lib/utilities.php');
?>
<?php

    $eleType = '';

    $page = 1;
    if (isset($_GET['page'])) 
        $page = $_GET['page'];

    if (isset($_GET['He']) && $_GET['He'] !== 'Error' && $_GET['He'] !=='') {
        $eleType = $_GET['He'];
        $KT = TimKiemWithPaging($conn,$eleType,'He', $page);
    } else {
        $KT = TimKiemWithPaging($conn,$eleType,'He', $page);
    }

    if (isset($_GET['idPet']) && $_GET['idPet'] !== '') {
        $KT = TimKiemWithPaging($conn, $_GET['idPet'], 'idPet', $page);
    } else if (isset($_GET['nameVN']) && $_GET['nameVN'] !== '') {
        $KT = TimKiemWithPaging($conn, $_GET['nameVN'], 'TenVN', $page);
    }
        
    ?>
        <div class="row">
            <div class="col-md-12 text-center element-form">
                <a href="./edit.php?He=T" class="btn btn-primary">Thủy</a>
                <a href="./edit.php?He=H" class="btn btn-danger">Hỏa</a>
                <a href="./edit.php?He=P" class="btn btn-success">Phong</a>
                <a href="./edit.php?He=D" class="btn btn-warning">Địa</a>
            </div>
            <div class="col-md-12 text-center element-form">
                <form action="./edit.php" method="GET" class="container search-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Id</label>
                                <input type="text" class="form-control col-sm-5" name="idPet" placeholder="Pet id">
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Tên TV</label>
                                <input type="text" class="form-control col-sm-5" name="nameVN" placeholder="Tên tiếng việt">
                            </div>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <input type="submit" value="Search" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-center element-form">
                <?php
                    for ($i = 1; $i <= 20; $i++) {
                        $btnclass = $i == $page ? 'btn-primary' : 'btn-outline-primary';
                        ?>
                            <a href="/edit.php?page=<?=$i?>&He=<?=$eleType?>" class="btn <?=$btnclass?>"><?=$i?></a>
                        <?php
                    }
                ?>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Ten TQ</td>
                            <td>Ten VN</td>
                            <td>Loai Kim Toa</td>
                            <td>Kim Toa</td>
                            <td>He</td>
                            <td>Mo ta</td>
                            <td>Hinh anh</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        while($row_KT = mysqli_fetch_array($KT)) {
                        ?>
                            <tr id="<?=$row_KT['idPet']?>">
                                <td>
                                    <label class="label label-default"><?=$row_KT['idPet']?></label>
                                </td>
                                <td>
                                    <input type="hidden" value="<?=$row_KT['idPet']?>" name="idPet">
                                    <input type="text" class="form-control" value="<?=$row_KT['TenTQ']?>" name="TenTQ">
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?=$row_KT['TenVN']?>" name="TenVN">
                                </td>
                                <td>
                                    <?=renderHeroKTType($conn, $row_KT['idLoai'])?>
                                </td>
                                <td>
                                    <?=renderHeroKT($conn, $row_KT['idKT'])?>
                                </td>
                                <td>
                                    <?=renderHeroTypeOption($row_KT['He'])?>
                                </td>
                                <td>
                                    <textarea class="form-control" rows="5" value="<?=$row_KT['MoTa']?>" name="MoTa"><?=$row_KT['MoTa']?></textarea>
                                    <!-- <input type="text" class="form-control" value="<?=$row_KT['MoTa']?>" name="MoTa"> -->
                                </td>
                                <td>
                                    <img src='/dist/images/Pet/<?=$row_KT['HinhAnh']?>'/>
                                    <input type="text" class="form-control" value="<?=$row_KT['HinhAnh']?>" name="HinhAnh">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary js-button-update">Update</button>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
             
        </script>
    <?php
    include_once('template/bottom-content.php');
?>
