<?php

    $blog_with_sidebar = "";
    if ( GBT_MT_Opt::getOption( 'sidebar_blog_listing' ) == "1" ) $blog_with_sidebar = "yes";
    if (isset($_GET["blog_with_sidebar"])) $blog_with_sidebar = $_GET["blog_with_sidebar"];    
?>
            
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
    <div class="row">
        <div class="large-12 columns">
            
            <header class="entry-header">
            
                <div class="row">
                    <?php if ( $blog_with_sidebar == "yes" ) : ?>
                    <div class="large-12 columns">
                    <?php else : ?>
                    <div class="large-8 large-centered columns without-sidebar">
                    <?php endif; ?>
                        <?php if ( is_single() ) : ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php else : ?>
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                        <?php endif; // is_single() ?>
                        
                        <div class="post_header_date"><?php mr_tailor_post_header_entry_date(); ?></div>
                    </div>
                </div>
                
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
        
            </header><!-- .entry-header -->
            
        </div><!-- .columns -->
    </div><!-- .row -->

    <div class="row">
        <?php if ( $blog_with_sidebar == "yes" ) : ?>
            <div class="large-12 columns">
        <?php else : ?>
            <div class="large-8 large-centered columns without-sidebar">
        <?php endif; ?>
            
            <div class="entry-content">
				<?php
                if( ($post->post_excerpt) && (!is_single()) ) {
                    the_excerpt();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="more-link"><?php esc_html_e('Continue reading &rarr;', 'mr_tailor'); ?></a>
                <?php
                } else {
                    the_content( esc_html__( 'Continue reading &rarr;', 'mr_tailor' ) );
                }
                ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'mr_tailor' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div><!-- .entry-content -->
        
            <?php if ( is_single() ) : ?>
            
                <?php do_action( 'post_sharing_options' ); ?>
				
				<footer class="entry-meta">
					
					<?php mr_tailor_entry_meta(); echo "."; ?>
										
				</footer><!-- .entry-meta -->
            
            <?php endif; ?>
                               
        </div><!-- .columns -->
    </div><!-- .row -->

</article><!-- #post -->
