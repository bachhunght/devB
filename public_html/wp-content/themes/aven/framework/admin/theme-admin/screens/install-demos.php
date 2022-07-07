<?php
$zozo_theme = wp_get_theme();
if($zozo_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $zozo_theme = wp_get_theme($template_dir);
}
$zozo_theme_version = $zozo_theme->get( 'Version' );
$zozo_theme_name = $zozo_theme->get('Name');

$zozothemes_url = 'http://zozothemes.com/';
?>
<div class="wrap about-wrap welcome-wrap zozothemes-wrap">
	<div class="zozothemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "aven" ) . ' ' . '<span>'. $zozo_theme_name .'</span>'; ?>
			<p class="theme-logo"><span class="theme-version"><?php echo esc_attr( $zozo_theme_version ); ?></span></p></h1>
			
			<div class="updated error zozo-importer-notice importer-notice-error">
				<p><strong><?php echo esc_html__( "We're sorry but the demo data could not import. It is most likely due to low PHP configurations on your server. Please do necessary configurations noticed in Warning message of imported demo.", 'aven' ); ?></strong></p>
			</div>
			
			<div class="updated zozo-importer-notice importer-notice-success"><p><strong><?php echo esc_html__( "Demo data successfully imported. Now, please install and run", "aven" ); ?> <a href="<?php echo admin_url();?>plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472" class="thickbox" title="<?php echo esc_html__( "Regenerate Thumbnails", "aven" ); ?>"><?php echo esc_html__( "Regenerate Thumbnails", "aven" ); ?></a> <?php echo esc_html__( "plugin once", "aven" ); ?>.</strong></p></div>
			
			<div class="about-text"><?php echo esc_html__( "Nice!", "aven" ) . ' ' . $zozo_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful wordpress theme. We hope you enjoy using it.", "aven" ); ?></div>
		</div>
		<h2 class="zozo-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=aven' ),  esc_html__( "Support", "aven" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Install Demos", "aven" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=zozothemes-plugins' ), esc_html__( "Plugins", "aven" ) );
			?>
		</h2>
	</div>
		
	 <div class="zozothemes-required-notices">
		<p class="notice-description"><?php echo esc_html__( "Installing a demo provides pages, posts, images, theme options, widgets and more. IMPORTANT: The required plugins need to be installed and activated before you install a demo.", "aven" ); ?></p>
	</div>
	
	<div class="zozothemes-demo-title">
	<h3 class="one-page">Aven Demo</h3>
	</div>
	
	<div class="zozothemes-demo-wrapper">
		<div class="features-section theme-demos theme-browser rendered">
		
			<?php wp_nonce_field( 'aven_demo_import_@#$%^&*(', 'aven_demo_import_nonce' ); ?>
			
			<!-- Theme Demo -->
			<div class="theme zozothemes-demo-item">
				<div class="demo-inner">
					<div class="theme-screenshot zozotheme-screenshot">
						<img src="<?php echo ZOZO_ADMIN_ASSETS . 'images/demo/classic.jpg'; ?>" />
					</div>
					<h3 class="theme-name" id="demo-shop"><?php echo esc_html__( "Aven Demo", "aven" ); ?></h3>
					<div class="theme-actions theme-buttons">
						<?php printf( '<a class="button button-primary button-install-demo" data-demo-id="demo-multi-classicshop" data-demo-woo="yes" data-demo-revslider="yes" data-rev-count="16" href="#">%1s</a>', esc_html__( "Install", "aven" ) ); ?>
						<?php printf( '<a class="button button-primary" target="_blank" href="%1s">%2s</a>', 'http://themes.zozothemes.com/aven/', esc_html__( "Preview", "aven" ) ); ?>
					</div>
					<div class="theme-requirements" data-requirements="<h2>WARNING:</h2>Importing demo content will give you pages, posts, theme options, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minutes to complete.<h3>DEMO REQUIREMENTS:</h3><ol><li>Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.</li><li>Revolution Slider Plugin must be activated for the sliders data to import.</li><li>Woocommerce Plugin must be activated for the shop data to import.</li></ol>">
					</div>
					<div class="zozo-demo-import-loader zozo-preview-demo-multi-classicshop"><i class="dashicons dashicons-admin-generic"></i></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="zozothemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "aven" ) . ' ' . $zozo_theme_name . '.'; ?></p>
    </div>
</div>