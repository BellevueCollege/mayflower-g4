<?php 
	global $mayflower_brand;
	$globals = new Globals();
?>
	</div><!-- row -->
</div><!-- #main .container -->

<?php

if ( $mayflower_brand == 'lite' ) {
	$globals->footer_legal();
} else {
	$globals->footer();
}
wp_footer();
?>

<!-- <?php
$mayflower_version = wp_get_theme();
echo $mayflower_version->Name . " version " . $mayflower_version->Version;
?>  -->

</body>
</html>
