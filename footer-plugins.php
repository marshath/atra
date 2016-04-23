<?php
//----------------------------------- //
// ------- Footer Plug-ins ---------- //
// ---------------------------------- // ?>


<?php //---------- Toggle Menu ---------// ?>
<script type="text/javascript">
jQuery(document).ready(function($){

	/* toggle nav */
	$("#menu-toggle").on("click", function(){
		$("#nav-menu").slideToggle();
		$(this).toggleClass("active");
	});

});
</script>


<?php //---------- Search Filter Toggle ---------// ?>
<script type="text/javascript">
jQuery(document).ready(function($){

	/* toggle nav */
	$("#search-toggle").on("click", function(){
		$("#search-filter").slideToggle();
		$(this).toggleClass("active");
	});

});
</script>


<?php //---------- Fancybox Lightbox ---------// 
	if (is_page('western-states-trekker')) { // show if Western States Trekker page only ?>
<script> $(document).ready(function() {
	
	$("a.gallery").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200,
		'arrows'		:	true,
		'maxWidth'		: 	800,
		'maxHeight'		: 	600,
		'fitToView'		: 	false,
		'width'			: 	'70%',
		'height'		: 	'70%'
	});
	
});
</script>

<?php } else {} ?>