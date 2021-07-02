<?php
/**
 * Displays top navigation
 */
?>
<div class="header-menu <?php if( get_theme_mod( 'aagaz_startup_fixed_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
	<div class="row m-0">
		<div class="col-lg-11 col-md-10">
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'aagaz-startup' ); ?>">
				<button role="tab" class="menu-toggle p-3 my-3 mx-auto" aria-controls="top-menu" aria-expanded="false">
					<?php
						esc_html_e( 'Menu', 'aagaz-startup' );
					?>
				</button>
				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
				) ); ?>				
			</nav>
		</div>
		<?php if( get_theme_mod('aagaz_startup_show_hide_search',true) != ''){ ?>
			<div class="col-lg-1 col-md-1">
				<div class="search-body text-center">
					<button type="button" class="search-show"><i class="<?php echo esc_attr(get_theme_mod('aagaz_startup_search_icon_changer','fas fa-search')); ?>"></i></button>
				</div>
			</div>
		<?php } ?>
		<div class="searchform-inner">
			<?php get_search_form(); ?>
			<button type="button" class="close"aria-label="Close"><span aria-hidden="true">X</span></button>
		</div>
	</div>
</div>