<?php //------------ Header Plugins --------------// 
	
// Insert Typekit Javascript Here ?>
<!-- <script type="text/javascript" src="//use.typekit.net/txy8kqp.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->
		
<?php // Loads jQuery Minified 1.9.1 ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


  
<?php /* Shrinks the header and navigation */ ?>
<script>  $(function(){
 var shrinkHeader = 170;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.header').addClass('shrink');
        }
        else {
            $('.header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
}); </script>


<?php // Custom Fonts ?>
<link href='http://fonts.googleapis.com/css?family=Raleway:700|Codystar|Graduate|Rye|' rel='stylesheet' type='text/css'>