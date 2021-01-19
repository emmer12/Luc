// JavaScript Document


$(document).ready(function () {

    $('label.tree-toggler').click(function () {
        $('label.tree-toggler').parent().children('ul.tree').hide(300);
        $(this).parent().children('ul.tree').toggle(300);
        /*$(this).parent().children('ul.tree').toggleClass("test");
         $(this).toggleClass("test-new"); */
    });

    $('.sort-tab').click(function () {
        $id = $(this).attr('id');
        $('.sort-tab-main').hide();
        $("#sort-tab" + $id).fadeIn('fast');
    });

    $('.sort-tab').click(function () {
        $('.sort-tab').removeClass('active');
        $(this).addClass('active');

    });

    $('#sort-tab1').addClass('active');
});

$(document).ready(function () {

    $("iframe").load(function () {

        $("#lfr-spinner").hide();

        $(this).contents().click(function () {
            $("body").click()
        });


    });
    if ($("iframe").length == 0) {

        $("#lfr-spinner").hide();

    }

    $(window).bind('beforeunload', function () {
        $('#lfr-spinner').show();
    }
    );

    $('.tabs').click(function () {
        $('.tabs-hidden').hide();
        $(this).siblings('.tabs-hidden').show();
        $('.tabs').removeClass("active");
        $(this).toggleClass("active");
    });

    $(".view-sample1").click(function () {
        $(".overlar-new1").fadeIn(300);
        $(".light-box-new1").fadeIn(300);

    });

    $(".close-new1, .overlar-new1").click(function () {
        $(".overlar-new1").fadeOut(300);
        $(".light-box-new1").fadeOut(300);
    });

    $(".view-sample2").click(function () {
        $(".overlar-new2").fadeIn(300);
        $(".light-box-new2").fadeIn(300);

    });

    $(".close-new2, .overlar-new2").click(function () {
        $(".overlar-new2").fadeOut(300);
        $(".light-box-new2").fadeOut(300);
    });


    $(".view-sample3").click(function () {
        $(".overlar-new3").fadeIn(300);
        $(".light-box-new3").fadeIn(300);

    });

    $(".close-new3, .overlar-new3").click(function () {
        $(".overlar-new3").fadeOut(300);
        $(".light-box-new3").fadeOut(300);
    });

    $(".view-sample4").click(function () {
        $(".overlar-new4").fadeIn(300);
        $(".light-box-new4").fadeIn(300);

    });

    $(".close-new4, .overlar-new4").click(function () {
        $(".overlar-new4").fadeOut(300);
        $(".light-box-new4").fadeOut(300);
    });

    $(".view-sample5").click(function () {
        $(".overlar-new5").fadeIn(300);
        $(".light-box-new5").fadeIn(300);

    });

    $(".close-new5, .overlar-new5").click(function () {
        $(".overlar-new5").fadeOut(300);
        $(".light-box-new5").fadeOut(300);
    });

    $(".view-sample6").click(function () {
        $(".overlar-new6").fadeIn(300);
        $(".light-box-new6").fadeIn(300);

    });

    $(".close-new6, .overlar-new6").click(function () {
        $(".overlar-new6").fadeOut(300);
        $(".light-box-new6").fadeOut(300);
    });

    $(".view-sample7").click(function () {
        $(".overlar-new7").fadeIn(300);
        $(".light-box-new7").fadeIn(300);

    });

    $(".close-new7, .overlar-new7").click(function () {
        $(".overlar-new7").fadeOut(300);
        $(".light-box-new7").fadeOut(300);
    });

    $(".view-sample8").click(function () {
        $(".overlar-new8").fadeIn(300);
        $(".light-box-new8").fadeIn(300);

    });

    $(".close-new8, .overlar-new8").click(function () {
        $(".overlar-new8").fadeOut(300);
        $(".light-box-new8").fadeOut(300);
    });

    $(".view-sample9").click(function () {
        $(".overlar-new9").fadeIn(300);
        $(".light-box-new9").fadeIn(300);

    });

    $(".close-new9, .overlar-new9").click(function () {
        $(".overlar-new9").fadeOut(300);
        $(".light-box-new9").fadeOut(300);
    });

    $(".view-sample10").click(function () {
        $(".overlar-new10").fadeIn(300);
        $(".light-box-new10").fadeIn(300);

    });

    $(".close-new10, .overlar-new10").click(function () {
        $(".overlar-new10").fadeOut(300);
        $(".light-box-new10").fadeOut(300);
    });


    $('.dropdown-login a').click(function () {
        $('.login-signin-box, .login-overlay').fadeToggle();
        $(this).toggleClass("active");
    });

    $('.navbar-toggle').click(function () {

        $('.login-signin-box').hide();
        $('.dropdown-login a').removeClass('active');
    });

    $('.close').click(function () {

        $('.login-signin-box, .login-overlay').hide();
        $('.dropdown-login a').removeClass('active');
    });


    $('.tabs-new').click(function () {
        $id = $(this).attr('id');
        $('.tabs-new-tab').hide();
        $("#tabs-new" + $id).fadeIn();
    });

    $('.tabs-new').click(function () {
        $('.tabs-new').removeClass('active');
        $(this).addClass('active');
    });

    $('html[lang="rw"] iframe').addClass("language-rwanda");

    var langFrame = $('.language-rwanda');
    langFrame.load(function () {
        langFrame.contents().find("body").addClass("lang-rw");

    });

    $('html[lang="fr"] iframe').addClass("language-fr");

    var langFrames = $('.language-fr');
    langFrames.load(function () {
        langFrames.contents().find("body").addClass("lang-fr");

    });

    /*$( window ).load(function() {
     $(".nav-right").show();
     }); */

    $('.navbar-toggle').click(function (e) {
        $('.navbar-collapse').animate({'left': '0px'});
        $('body').addClass("scroll-left");
    });

    $('.navbar-collapse-close').click(function () {
        $('.navbar-collapse').animate({'left': '-200%'});
        $('body').removeClass("scroll-left");
    });

    $(".after-login .logout-btn span span.user").parent("span").addClass("user-after-login");
    $(".signin").parent(".col-sm-4").addClass("sign-in-top");
    $(".announcements").parent(".col-sm-4").addClass("announcements-top");


//     /*Unseen Notification count loader start*/
//     var notifBadge = $("#notification-menu .badge");
//     window.updateNotificationMenu = function () {
//         $.ajax("/api/v1/notification/unseen-count", {
//             type: 'GET',
//             cache: false,
//             contentType: 'application/json; charset=utf-8'
//         }).done(function (data) {
// //        menu.removeClass("hidden");
//             notifBadge.text(data);
//             if (data) {
//                 console.log("notification count: "+ data);
//                 notifBadge.removeClass("hidden");
//             } else {
//                 notifBadge.addClass("hidden");
//             }
//         }).fail(function (jqxhr) {
//
//         }).always(function (data) {
//         });
//     };
//     window.updateNotificationMenu();
//     /*Unseen Notification count loader end*/

});













