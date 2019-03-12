<?php
/**
 * The template part for header
 *
 * @package VW Transport Cargo 
 * @subpackage vw_transport_cargo
 * @since VW Transport Cargo 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-transport-cargo'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>