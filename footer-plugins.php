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