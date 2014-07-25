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