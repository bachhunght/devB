<?php
/**
 * Template Name: Testimonials
 */

get_header( );?>

<!-- banner section -->
<?php get_template_part( 'template-parts/inner', 'banner' ); ?>

<!-- content part -->
<section class="inner-content-part">
    <div class="container">
        <aside class="left-contentbar">
            <?php
                $args = array ( 
                    'post_type' => 'aa-testimonials' 
                );
            
                query_posts($args);

                if (have_posts()) : 
                    echo "<div class='testimonials-list'>";
                    while (have_posts()) : the_post(); 

                        $client_name = get_post_meta($post->ID, 'wpcf-client-name', true);
                        $client_area = get_post_meta($post->ID, 'wpcf-client-area', true);
                        $testimonial_content = get_post_meta($post->ID, 'wpcf-testimonial', true);
                        $testimonial_video = get_post_meta($post->ID, 'wpcf-testimonial-video-url', true);

                        echo '<div class="testimonial-item blogcontent">';

                        if($testimonial_video) {
                            parse_str( parse_url( $testimonial_video, PHP_URL_QUERY ), $youtube_video_id );
                            echo '<iframe class="testimonial-video" width="560" height="315" src="//www.youtube.com/embed/'.$youtube_video_id['v'].'" frameborder="0" allowfullscreen></iframe>';
                        }

                        if($client_name) {
                            echo '<div class="aa-testimonial-name">' . $client_name . '</div>';
                        }

                        if($testimonial_content) {
                            echo '<div class="testimonial-content">' . $testimonial_content . '</div>';
                        }

                        if($client_area) {
                            echo '<div class="aa-testimonial-area">' . $client_area . '</div>';
                        }

                        echo '</div>';

                    endwhile; 
                    echo "</div>";
                endif; 
            ?>
        </aside>

        <?php get_sidebar( ); ?>
    </div>
</section>


<?php get_footer( );