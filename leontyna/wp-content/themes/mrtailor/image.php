<?php get_header(); ?>

	<div id="primary" class="content-area">                    
    
        <div class="row">
            
            <div class="large-12 columns">            
                <div id="content" class="site-content attachement" role="main">             

					<?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                
                                <div class="row">
                                    <div class="large-12 columns">
                                    	<h1 class="entry-title"><?php the_title(); ?></h1>
                                    </div><!-- .large-12 .columns -->
                                </div><!-- .row -->
                                
                                <div class="row">
                                    
                                    <div class="large-8 large-centered columns">                                    
                                        <div class="entry-meta-attachment">
                                            <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf(  'Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at&nbsp;<a href="%3$s" title="Link to full-size image"> <i class="picture-icon"></i>&nbsp; %4$s &times; %5$s</a> in &nbsp;<a href="%6$s" title="Return to %7$s" rel="gallery"><i class="category-icon"></i>&nbsp; %7$s</a> by <span class="author"><a href="%8$s">%9$s</a></span>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url(wp_get_attachment_url()),
                                                esc_attr($metadata['width']),
                                                esc_attr($metadata['height']),
                                                get_permalink( $post->post_parent ),
                                                get_the_title( $post->post_parent ),
                                                get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),
                                                get_the_author_link()
                                            );
                                        ?>
                                        </div><!-- .entry-meta -->                                    
                                    </div><!-- .large-8 .large-centered .columns -->
                                    
                                </div><!-- .row -->
                                
                                <div class="row">
                                    
                                    <div class="large-6 small-6 columns">
                                    	<div class="previous-image"><?php previous_image_link( false, esc_html__( '&larr; Previous', 'mr_tailor' ) ); ?></div>
                                    </div><!-- .large-2 .columns -->
                                    
                                    <div class="large-6 small-6 columns">
                                    	<div class="next-image"><?php next_image_link( false, esc_html__( 'Next &rarr;', 'mr_tailor' ) ); ?></div>
                                    </div><!-- .large-2 .columns -->

                                </div><!-- .row -->

                            </header><!-- .entry-header -->
            
                            <div class="entry-content">

								<?php
                                    /**
                                     * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
                                     * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
                                     */
                                    $attachments = array_values( get_children( array(
                                        'post_parent'    => $post->post_parent,
                                        'post_status'    => 'inherit',
                                        'post_type'      => 'attachment',
                                        'post_mime_type' => 'image',
                                        'order'          => 'ASC',
                                        'orderby'        => 'menu_order ID'
                                    ) ) );
                                    foreach ( $attachments as $k => $attachment ) {
                                        if ( $attachment->ID == $post->ID )
                                            break;
                                    }
                                    $k++;
                                    // If there is more than 1 attachment in a gallery
                                    if ( count( $attachments ) > 1 ) {
                                        if ( isset( $attachments[ $k ] ) )
                                            // get the URL of the next image attachment
                                            $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                                        else
                                            // or get the URL of the first image attachment
                                            $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                                    } else {
                                        // or, if there's only 1 image, get the URL of the image
                                        $next_attachment_url = wp_get_attachment_url();
                                    }
                                ?>
    
                                <a href="<?php echo esc_url($next_attachment_url); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
                                    echo wp_get_attachment_image( $post->ID, "full" );
                                ?></a>
            
                            </div><!-- .entry-content -->
            
                        </article><!-- #post-<?php the_ID(); ?> -->
            
                    <?php endwhile; // end of the loop. ?>
                
                </div><!-- #content -->                            
            </div><!-- .large-12 .columns -->
            
        </div><!-- .row -->
                 
    </div><!-- #primary -->
            
<?php get_footer(); ?>