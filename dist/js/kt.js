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

            $(".kt-pet").html("<img src='/dist/images/KT/"+kt+".png' class='kt-images' />");

            $(".noibat-pet").html(noibat);

            $("#info-pet").modal();

        });

    }



    moreInfoPet();



    //get data map

    var jsonObj = (function () {

        var json = null;

        $.ajax({

            'async': false,

            'global': false,

            'url': "/dist/json/map.json",

            'dataType': "json",

            'success': function (data) {

                json = data;

            }

        });

        return json;

    })();



    var valueMap = 0;

    function realImgDimension(link) {

        var width =0;

        $(".img-temp").attr('src',link);

        $(".img-temp").prop('src',link);



        return $(".img-temp").width();





    }



    $("#list-map").change(function () {

        valueMap= $(this).val();

        var newlink = "/dist/images/map/"+jsonObj.linkbando[valueMap];



        $("#hangdong").html("");

        if(jsonObj.namehangdong[valueMap] !== null){



            $("#hangdong").append("<option value='default'>Chọn Hang động----------</option>");

            for( var i = 0; i < jsonObj.namehangdong[valueMap].length; i++){

                $("#hangdong").append("<option value='"+i+"' >"+ jsonObj.namehangdong[valueMap][i]+"</option>");

            }

            $(".chon-hangdong").show();

        }else{

            $(".chon-hangdong").hide();

        }

        $(".content-map").empty();

        $(".content-map").html("<img src='"+newlink+"' class='content-img' />")

        $(".content-img").attr("src", newlink);

        $(".content-img").prop("src", newlink);

        $(".content-map").trigger('zoom.destroy');

         if($(window).width() < 500 ||valueMap == 0 ){

             $(".content-map").zoom({ on:'click', url:newlink });

         }



        console.log($(window).width());



    });



    $("#hangdong").change(function () {

        var valueHangDong = $(this).val();

        if(valueHangDong!=="default"){

            var newLinkHangDong = "/dist/images/map/"+jsonObj.linkhangdong[valueMap][valueHangDong];

            $(".content-img").attr("src", newLinkHangDong);

            $(".zoomImg").attr("src", newLinkHangDong);

            $(".content-img").prop("src", newLinkHangDong);

            $(".zoomImg").prop("src", newLinkHangDong);





            $(".content-map").trigger('zoom.destroy');

            if($(window).width() < 500 || valueMap == 0){

                $(".content-map").zoom({ on:'click', url:newLinkHangDong });

            }

        }



    });

//zoom image

    $(".content-map").zoom({ on:'click',url:"/dist/images/map/FullMaps.jpg" });

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
                MoTa: $(row).find("textarea[name=MoTa]").val(),
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