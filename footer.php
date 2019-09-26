<?php global $mayflower_brand; ?>
	</div><!-- row -->
</div><!-- #main .container -->

<?php

if ( $mayflower_brand == 'lite' ) {
	bc_footer_legal();
} else {
	bc_footer();
}
wp_footer();
?>

<!-- <?php
$mayflower_version = wp_get_theme();
echo $mayflower_version->Name . " version " . $mayflower_version->Version;
?>  -->

</body>
</html>
