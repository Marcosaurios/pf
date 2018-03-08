
$(document).ready(function(){

    function openNav() {
        document.getElementById("sidenav").style.width = "100%";
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

    // Add uk-scroll property to links in top menu
    $("#top-menu>li>a").each( function(){
      $("#top-menu>li>a").attr('uk-scroll','');
    })

    // Add collapse class to side nav menu links
    $("#menu-menu-top>li>a").addClass("collapse");

    $("#sidebtn").on("click",function(){
        openNav();
        //console.console.log("open");
    });
    $("#closebtn").on("click",function(){
        closeNav();
        //console.console.log("close");
    });
    $("a.collapse").on("click", function(){
        closeNav();
        //console.console.log("close");
    });


    UIkit.grid("#grid");

    new WOW().init();
  });

  // --- Scrollspy ---

    // Cache selectors
    var lastId,
        topMenu = $("#top-menu"),
        topMenuHeight = topMenu.outerHeight()+10,
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function(){
          var item = $($(this).attr("href"));
          if (item.length) { return item; }
        });

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    menuItems.click(function(e){
      var href = $(this).attr("href"),
          offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
      $('html, body').stop().animate({
          scrollTop: offsetTop+15
      }, 300);
      e.preventDefault();
    });

    // Bind to scroll
    $(window).scroll(function(){
       // Get container scroll position
       var fromTop = $(this).scrollTop()+topMenuHeight;

       // Get id of current scroll item
       var cur = scrollItems.map(function(){
         if ($(this).offset().top < fromTop)
           return this;
       });
       // Get the id of the current element
       cur = cur[cur.length-1];
       var id = cur && cur.length ? cur[0].id : "";

       if (lastId !== id) {
           lastId = id;
           // Set/remove active class
           menuItems
             .parent().removeClass("active")
             .end().filter("[href='#"+id+"']").parent().addClass("active");
       }
    });
