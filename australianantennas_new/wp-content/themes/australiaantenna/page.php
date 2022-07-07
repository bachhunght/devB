<?php
/**
 * Default page template
 */

get_header();?>

<!-- banner section -->
<?php $banner = get_field('banner'); ?>
<section class="inner-banner-part" style="background-image: url(<?php echo $banner['url']; ?>);">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>  
</section>

<!-- content part -->
<section class="inner-content-part">
    <div class="container">
        <aside class="left-contentbar">
            <?php if(have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endif; ?>
          <!--  <div class="main-text">
                <h2>Melbourne’s Leading Provider of Digital TV Antenna Solutions</h2>
                <p>Melbourne has already made a big switch to digital antenna television from analogue TV. With your TV antenna in place, you can have a better picture and sound quality while watching your favourite television program.</p>
                <p>However bad reception can interfere with your TV viewing experience. If this problem occurs at your home or business, Australian Antennas is just a phone call away. We have a team of highly skilled professionals who can provide you with a wide range of reliable solutions for your digital TV reception problems. This includes TV antenna repairs and replacements, antenna installations and antenna masthead amplifiers.</p>
            </div>

            <div class="normal-info-part">
                <h4>Reasons Why You Should Choose Australian Antennas For Your Digital Tv Antenna Requirements</h4>
                <p>The different factors contributing to signal problems on your TV can now be solved with the help of our antenna technicians in Melbourne.</p>

                <h5>Antenna problems will be fixed right away</h5>
                <p>Whether you call us on a weekday or on a weekend, we’ll immediately respond to your concern and send our qualified technicians without delay. Since we always strive to meet our clients’ needs, we also make sure to finish all of our antenna repairs in Melbourne within or before the expected timeframe.</p>

                <h5>Free Onsite Quote With No Obligations</h5>
                <p>As one of Australia’s leading antenna specialists, you can call us without obligations for a FREE onsite inspection. Before we do any kind of repair or replacement work, we’ll give you all the options and antenna advice you need so you can come to an informed decision.</p>
                <p>Certified technicians with oh&s qualifications.</p>
                <p>We only employ professional and certified technicians with OH&S qualifications for industry best practices and safety protocols.</p>

                <h5>We Provide A 10-Year Warranty</h5>
                <p>We’re confident that our digital TV antennas are of the best quality, so we guarantee a 10-year warranty.</p>
            </div>

            <div class="list-part">
                <h2>Australian Made for Australian Homes </h2>
                <p>We are extremely selective with the digital antennas we install so you can have piece of mind that our professional installers will choose only the best performing and highest quality antenna that will provide you with a lifetime of reliable digital TV reception.</p>
                <p>The technician will choose the correct antenna based on a number of factors including:</p>

                <ul>
                    <li>Site test to determine ideal location on the roof and style of antenna best suited to closest/strongest signal transmission site</li>
                    <li>Digital antenna to match the source broadcast such as either VHF Band 3 digital antenna or UHF Band 4/5 digital antennas with horizontal and vertical polarisation options</li>
                    <li>Line of sight factors such as nearby buildings, trees, hills etc.</li> 
                    <li>Number of existing/required TV outlets</li>
                    <li>Detection of any potential interference issue (LTE/4G) that may disrupt digital TV reception</li>
                    <li>Required mast height to achieve reliable line of sight to the transmission source</li>
                </ul>

                <a href="javascript:void(0)" class="main-btn">Get a Quote</a>
            </div>-->
        </aside>

        <?php get_sidebar(); ?>
    </div>
</section>


<?php get_footer();