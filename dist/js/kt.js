$(document).ready(function(){
    $(".KT").click(function(){
        var idDIV = $(this).attr("id");
        $.get("kimtoa/listKTtheoloai.php",{idLoai:idDIV},function(data){
            $(".list_kimtoa").html(data);
            window.location.href = '#pet';
        }).done(function () {
            moreInfoPet();
        });
    });

    $(".btnSearch").click(function(){
        var typeSearch = $("#type_search").val();
        var keySearch = $(".inputSearch").val();
        $.get("kimtoa/searchPet.php",{Keyword:keySearch,Type:typeSearch},function(data){

            $(".list_kimtoa").html(data);
        }).done(function () {
            moreInfoPet();
        });
    });

    $('.inputSearch').on('keypress', function (e) {
        if(e.which === 13){

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");

            $(".btnSearch").click();

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");
        }
    });

    $("#lang_search").click(function () {
        var type = $("#type_search").val();
        if(type === '0'){
            $(this).html("TQ");
            $("#type_search").val("1");
            $("#type_search").attr("value",1);
            $("#type_search").prop("value",1);
        }else{
            $(this).html("VN");
            $("#type_search").val("0");
            $("#type_search").attr("value",0);
            $("#type_search").prop("value",0);
        }
    });

    function moreInfoPet() {
        $(".pet").click(function () {
            var tenTQ = $(this).data("tq");
            var tenVN = $(this).data("vn");
            var noibat = $(this).data("noibat");
            var kt = $(this).data("kt");

            var he = $(this).data("he");
            var img= $(this).data("img");

            if (img != '0'){
                $(".images-pet").html(img);
            }else {
                $(".images-pet").html("Chưa có hình ảnh");
            }

            $(".type-pet").html(he);
            $(".name-pet").html(tenTQ + " - " + tenVN);
            $(".kt-pet").html("<img src='./dist/images/KT/"+kt+".png' class='kt-images' />");
            $(".noibat-pet").html(noibat);

            $("#info-pet").modal();
        });
    }

    moreInfoPet();

    $(".js-drop-image").msDropDown();

    function loadUpdateEvent() {
        $(document).on('click','.js-button-update', event => {
            console.log('test');
            let row = event.target.closest('tr');
            console.log(row);
            let data = {
                idPet: $(row).find("input[name=idPet]").val(),
                TenTQ: $(row).find("input[name=TenTQ]").val(),
                TenVN: $(row).find("input[name=TenVN]").val(),
                idLoai: $(row).find("select[name=idLoai]").val(),
                idKT: $(row).find("select[name=idKT]").val(),
                He: $(row).find("select[name=He]").val(),
                MoTa: $(row).find("input[name=MoTa]").val(),
                HinhAnh: $(row).find("input[name=HinhAnh]").val(),
            }
            
            console.log(data);
            $.post("page/update.php",data,function(result){
                console.log(result);
                if (result === '1')
                    location.reload();
                else {
                    alert('Error, check console log');
                    console.log(result);
                }
            });
        });	
    }

    loadUpdateEvent();
});