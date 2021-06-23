//START READY
$(document).ready(function() {
    $(".ctrlP").animate({
            opacity: 1
        },
        500
    );

    $(".boxR").mouseenter(function() {
        $(".boxR").css("opacity", "0.8");
    });
    $(".boxR").mouseleave(function() {
        $(".boxR").css("opacity", "0.7");
    });
    $(".boxL").mouseenter(function() {
        $(".boxL").css("opacity", "0.8");
    });
    $(".boxL").mouseleave(function() {
        $(".boxL").css("opacity", "0.7");
    });



    $(".boxR").animate({
            width: '600px',
            top: '150px',
            height: '600px',
            opacity: '0.7',
            borderRadius: '10px'
        },
        1000
    );




    $(".boxL").animate({
            width: '450px',
            top: '150px',
            height: '450px',
            opacity: '0.7',
            borderRadius: '50%'
        },
        1000
    );
    /*---------------------------------------------------*/

    $('body').css('background-image', 'url("img/img1.png")');
    $('body').css('background-attachment', 'fixed');

}); //END READY