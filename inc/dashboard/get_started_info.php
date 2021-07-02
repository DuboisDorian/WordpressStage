<?php

add_action( 'admin_menu', 'aagaz_startup_gettingstarted' );
function aagaz_startup_gettingstarted() {
	add_theme_page( esc_html__('About Theme', 'aagaz-startup'), esc_html__('About Theme', 'aagaz-startup'), 'edit_theme_options', 'aagaz-startup-guide-page', 'aagaz_startup_guide');   
}

function aagaz_startup_admin_theme_style() {
   wp_enqueue_style('aagaz-startup-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'aagaz_startup_admin_theme_style');

function aagaz_startup_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Aagaz Startup Theme', 'aagaz-startup' ) ?> </h2>
			<p><?php esc_html_e( "Please Click on the link below to know the theme setup information", 'aagaz-startup' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=aagaz-startup-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Get Started ', 'aagaz-startup' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'aagaz_startup_notice');


/**
 * Theme Info Page
 */
function aagaz_startup_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'aagaz-startup' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
				<div class="intro">
					<div class="pad-box">
						<h2 align="center"><?php esc_html_e( 'Welcome to Aagaz Startup Theme', 'aagaz-startup' ); ?>
						<span class="version" align="center">Version: <?php echo esc_html($theme['Version']);?></span></h2>	
						</span>
						<div class="powered-by">
							<p align="center"><strong><?php esc_html_e( 'Theme created by ThemesEye', 'aagaz-startup' ); ?></strong></p>
							<p align="center">
								<img role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>

			<div class="tab">
			  <button role="tab" class="tablinks" onclick="aagaz_startup_open(event, 'lite_theme')">Getting Started</button>		  
			  <button role="tab" class="tablinks" onclick="aagaz_startup_open(event, 'pro_theme')">Get Premium</button>
			</div>

			<!-- Tab content -->
			<div id="lite_theme" class="tabcontent open">
				<h2 class="tg-docs-section intruction-title" id="section-4" align="center"><?php esc_html_e( '1). Aagaz Startup Lite Theme', 'aagaz-startup' ); ?></h2>
				<div class="row">
					<div class="col-md-5">
						<div class="pad-box">
	              			<img role="img" role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
	              		 </div> 
					</div>
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
		                    <div class="table-image">
								<table class="tablebox">
									<thead>
										<tr>
											<th><?php esc_html_e('Setup', 'aagaz-startup'); ?></th>
											<th><?php esc_html_e('Click Here', 'aagaz-startup'); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php esc_html_e('Logo', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Menus', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Top Header', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=aagaz_startup_contact_details') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Slider', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=aagaz_startup_slider') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Post Settings', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=aagaz_startup_blog_post') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Footer', 'aagaz-startup'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=aagaz_startup_footer') ); ?>" target="_blank"><?php esc_html_e('Click', 'aagaz-startup'); ?></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<ol>
								<li><?php esc_html_e( 'Start','aagaz-startup'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','aagaz-startup'); ?></a> <?php esc_html_e( 'your website.','aagaz-startup'); ?> </li>
								<li><?php esc_html_e( 'Aagaz Startup','aagaz-startup'); ?> <a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','aagaz-startup'); ?></a> </li>
							</ol>
	                    </div>
	                </div>
				</div><br><br>
				
	        </div>
	        <div id="pro_theme" class="tabcontent">
				<h2 class="dashboard-install-title" align="center"><?php esc_html_e( '2.) Premium Theme Information.','aagaz-startup'); ?></h2>
            	<div class="row">
					<div class="col-md-7">
						<img role="img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pro-links" >
					    	<a href="<?php echo esc_url( AAGAZ_STARTUP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'aagaz-startup'); ?></a>
							<a href="<?php echo esc_url( AAGAZ_STARTUP_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'aagaz-startup'); ?></a>
							<a href="<?php echo esc_url( AAGAZ_STARTUP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'aagaz-startup'); ?></a>
						</div>
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','aagaz-startup'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'For a startup to make its name in the intensely competitive market, it must have a powerful and bold website. Our startup WordPress theme is ideal to fulfil these needs and give much more to a website with its clean design, sophisticated layout and advanced functionality. It is a multipurpose theme which is designed to become skin for diverse range of business websites and all types of startups whether it is an IT startup company, entrepreneurship, joint venture or tech startup. This fully responsive startup WordPress theme has optimized pages that load with a lightning fast speed and its SEO is well versed to rank your website higher on search engines. All the necessities of a modern theme are included in this theme like responsiveness, cross-browser compatibility, multilingualism, retina readiness, social media icons and RTL support. The best part is that it comes with friendly support and regular theme updates for one year.', 'aagaz-startup' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">								
							<h3><?php esc_html_e( 'Pro Theme Features','aagaz-startup'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Easy install 10 minute setup Themes','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Multiplue Domain Usage','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Premium Technical Support','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'FREE Shortcodes','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Multiple page templates','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Google Font Integration','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Customizable Colors','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Theme customizer ','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Documention','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Option','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Plugin Compatible','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Social Media Integration','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Incredible Support','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Eye Appealing Design','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Simple To Install','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Fully Responsive ','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Translation Ready','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'Custom Page Templates ','aagaz-startup'); ?></li>
									<li><?php esc_html_e( 'WooCommerce Integration','aagaz-startup'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
          	<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','aagaz-startup'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','aagaz-startup'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','aagaz-startup'); ?></a></li>
						</ol>
					</div>

					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','aagaz-startup'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','aagaz-startup'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','aagaz-startup'); ?></a> <?php esc_html_e( 'your website.','aagaz-startup'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Help Docs','aagaz-startup'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','aagaz-startup'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','aagaz-startup'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','aagaz-startup'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( AAGAZ_STARTUP_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'aagaz-startup'); ?></a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php
}?>