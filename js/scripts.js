$(document).ready(function(){
    
    function openNav() {
        document.getElementById("sidenav").style.width = "250px";
        document.getElementById("closebtn").style.display = "block";
        document.getElementById("closebtn").style.visibility = "visible";
        document.getElementById("sidebtn").style.display = "none";
        document.getElementById("sidebtn").style.visibility = "hidden";
    }
    
    function closeNav() {
        document.getElementById("sidenav").style.width = "0";
        document.getElementById("closebtn").style.display = "none";
        document.getElementById("closebtn").style.visibility = "hidden";
        document.getElementById("sidebtn").style.display = "block";
        document.getElementById("sidebtn").style.visibility = "visible";
    }

    $('.carousel').slick({
        autoplay: true,
        autoplaySpeed: 3500,
        infinite: true,
        fade: true,
        cssEase: 'linear',
        prevArrow: false,
        nextArrow: false
        //adaptiveHeight: true
    });

    $("#sidebtn").on("click",function(){
        openNav();
    });
    $("#closebtn").on("click",function(){
        closeNav();
    });
    $(".collapse").on("click", function(){
        closeNav();
    });

    UIkit.grid("#grid");

    new WOW().init();
  });