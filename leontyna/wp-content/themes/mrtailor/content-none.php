<?php

	$blog_with_sidebar = "";
	if ( GBT_MT_Opt::getOption( 'sidebar_blog_listing' ) == "1" ) $blog_with_sidebar = "yes";
?>

<section class="no-results not-found">
	
	<div class="row">
	
	<?php if ( $blog_with_sidebar != "yes" ) :  ?>
		<div class="large-8 large-centered text-center columns without-sidebar">
	<?php endif; ?>	
	
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'mr_tailor' ); ?></h1>
		</header><!-- .page-header -->
	
		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
				<p>
					<?php
					/* translators: 1: URL */
					printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mr_tailor' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) );
					?>
				</p>
	
			<?php elseif ( is_search() ) : ?>
	
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mr_tailor' ); ?></p>
				<?php get_search_form(); ?>
	
			<?php else : ?>
	
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mr_tailor' ); ?></p>
				<?php get_search_form(); ?>
	
			<?php endif; ?>
		</div><!-- .page-content -->
		
	</div><!--.large-8-->
	
	<?php if ( $blog_with_sidebar != "yes" ) : ?>
		</div>
	<?php endif; ?>	
		
</section><!-- .no-results -->
