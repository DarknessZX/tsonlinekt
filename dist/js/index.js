 function loadToolTipEvent() {
    // var KTList = document.querySelectorAll('[rel="tooltip"]');
    // console.log(KTList);
    $('[data-toggle="popover"]').popover();

    // $('body').on('click', function (e) {
    //     //only buttons
    //     if ($(e.target).data('toggle') !== 'popover'
    //         && $(e.target).parents('.popover.in').length === 0) { 
    //         $('[data-toggle="popover"]').popover('hide');
    //     }
    // });
 }

 $(document).ready(function() {
    $(".js-drop-image").msDropDown();
 });
 