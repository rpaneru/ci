<!DOCTYPE html>
<html lang="en">
<head>
<title>Educational An Education Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Educational Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="<?php echo base_url();?>public/frontEnd/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>public/frontEnd/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>public/frontEnd/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
<!-- //online-fonts -->
</head>

<body>

    <?php
    if($guestHeader){echo $guestHeader;}
    
    if($page){echo $page;}
    
    if($guestFooter){echo $guestFooter;}
    ?>



<!-- js -->
<script type="text/javascript" src="<?php echo base_url();?>public/frontEnd/js/jquery-2.1.4.min.js"></script>


<script src="<?php echo base_url();?>public/frontEnd/js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>public/frontEnd/css/chocolat.css" type="text/css" media="screen">
<!--light-box-files -->
<script>
$(function() {
        $('.gallery-grid a').Chocolat();
});
</script>
 <!-- required-js-files-->

<link href="<?php echo base_url();?>public/frontEnd/css/owl.carousel.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/frontEnd/js/owl.carousel.js"></script>
<script>
$(document).ready(function() {
  $("#owl-demo").owlCarousel({
    items : 1,
    lazyLoad : true,
    autoPlay : true,
    navigation : false,
    navigationText :  false,
    pagination : true,
  });
});
</script>
<!--//required-js-files-->

<script src="<?php echo base_url();?>public/frontEnd/js/responsiveslides.min.js"></script>
<script>
$(function () {
    $("#slider").responsiveSlides({
        auto: true,
        pager:false,
        nav: true,
        speed: 1000,
        namespace: "callbacks",
        before: function () {
                $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
                $('.events').append("<li>after event fired.</li>");
        }
    });
});
</script>


<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>public/frontEnd/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/frontEnd/js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
});
</script>
<!-- start-smoth-scrolling -->

<!-- bottom-top -->
<!-- smooth scrolling -->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!--// bottom-top -->
<script type="text/javascript" src="<?php echo base_url();?>public/frontEnd/js/bootstrap-3.1.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery_disable_autocomplete_master/jquery.disable.autocomplete.min.js"></script>
   
<link rel="stylesheet" href="<?php echo base_url();?>public/js/jQuery-Validation-Engine-master/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>public/js/jQuery-Validation-Engine-master/css/template.css" type="text/css"/>

<script src="<?php echo base_url();?>public/js/jQuery-Validation-Engine-master/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>public/js/jQuery-Validation-Engine-master/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>
$(document).ready(function(){
    
    /*
    var defaults = {
    containerID: 'toTop', // fading element id
    containerHoverID: 'toTopHover', // fading element hover id
    scrollSpeed: 1200,
    easingType: 'linear'
    };
    */
    $().UItoTop({ easingType: 'easeOutQuart' });
    
    $('[name="emailOrMobile"]').disableAutocomplete();
    $('[name="password"]').disableAutocomplete();
    
    $("#loginForm").validationEngine({promptPosition: 'inline'});
    
    
    //$("#forgotPasswordForm").validationEngine({promptPosition: 'inline'});    
});
</script>

</body>
</html>


