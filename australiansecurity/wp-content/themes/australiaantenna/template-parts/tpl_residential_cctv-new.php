<?php
/**
 * Template Name: New Residential CCTV pages
 */

get_header();
$pageID=get_the_ID();

     $bannerurl ='';
    $bannerurl = get_field('banner_image',$pageID); 

    if( empty( $bannerurl )) {
        $bannerurlClass = 'banner_bg_blue';

    }else{$bannerurl ='style="background-image: url('.$bannerurl.');"';}

?>

<section class="inner-banner-part defult_page_banner <?php echo $bannerurlClass;?>" <?php echo $bannerurl;?>>

    <div class="container">

        <h1><?php the_title(); ?></h1>

    </div>  

</section>

<div class="cctv-installation-page">
		<div class="container">
			<div class="iconow">
				<img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icon.png" alt="">
			</div>
			<div class="title-sec">
			    <p><?php echo get_field('pagetitle',$pageID);?></p>
				<h2><?php echo get_field('page_subtitle',$pageID);?></h2>
				
			</div>

			<div class="main-content-now">
							<?php

			// Start the Loop.
			while ( have_posts() ) :
				the_post();

		the_content();

			endwhile; // End the loop.
			?>
		
			<?php if(get_field('page_youtube_id_1',$pageID)!="" || get_field('page_youtube_id_2',$pageID)!=""){?>
		<div class="cctv-footage-row">
					<div class="footage-left">
					<?php if(get_field('page_youtube_id_1',$pageID)!=""){?>
						<h5><?php echo get_field('page_youtube_title_1',$pageID);?></h5>
						<div class="video-sec">
						<iframe width="764" height="430" src="https://www.youtube.com/embed/<?php echo get_field('page_youtube_id_1',$pageID);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						
</div>
					<?php }?></div>
					<div class="footage-right">
					<?php if(get_field('page_youtube_id_2',$pageID)!=""){?>
						<h5><?php echo get_field('page_youtube_title_2',$pageID);?></h5>
						<div class="video-sec"><iframe width="764" height="430" src="https://www.youtube.com/embed/<?php echo get_field('page_youtube_id_2',$pageID);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	</div>
						<?php }?>
					</div>
				</div>
	<?php }?>
	
		<?php if( have_rows('case_studies',$pageID) ):?>
<h5><?php echo get_field('case_studies_title',$pageID);?></h5>
				<div class="col-row">
					<?php while( have_rows('case_studies',$pageID) ) : the_row();?>
					<div class="col-bx">
					
					<div class="col-inner-bx">
					   <div class="col-img"><a href="<?php echo get_sub_field('case_studies_link');?>"><img src="  <?php echo get_sub_field('case_studies_image');?>" alt="cctv-img-1"></a></div>
					   <div class="col-cont">
					     <div class="col-icon"><img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icons-1.png" alt="camera-icons-1"></div>
						  <h6><a href="<?php echo get_sub_field('case_studies_link');?>"> <?php echo get_sub_field('case_studies_name');?></a></h6>
					   </div></div>
					   
					</div>
					<?php 
					endwhile; 
					
					
?>
				</div>
					<?php 
				
					endif;
					
?>
	
	
			</div>
		</div>
	</div>
					<?php if(get_field('after_content_section_text',$pageID)!=""){?>
			<div class="case-studies-sec">
	<div class="container-fluid">
		<div class="case-studies-row">
			  <div class="case-studies-left">
				<p><?php echo get_field('after_content_section_text',$pageID);?></p>
			  </div>
			  <div class="case-studies-right">
				<img src="<?php echo get_field('after_content_section_image',$pageID);?>" alt="cctv-img-2">
			  </div>
		  </div>
	  </div>
</div>
		<?php }?>
	
	<?php if( have_rows('frequently_asked_questions',$pageID) ):?>
	<div class="faqs-sec">
		<div class="container">
		    <div class="iconow">
			   <img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icon.png" alt="">
		    </div>
		    <div class="title-sec">
			   <h2>Frequently Asked Questions</h2>
			   <p>Call now for a <strong> FREE</strong> Quote <strong><a href="tel:1300 361 121">1300 361 121</a></strong></p>
		    </div>

		    <div class="faqs-row">
			
		    	<ul>
	<?php while( have_rows('frequently_asked_questions',$pageID) ) : the_row();?>
		    		<li>
		    			<a class="accordion"><?php echo get_sub_field('faq_question');?></a>
		    			<div class="panel faqs-content">
						  <?php echo get_sub_field('faq_answer');?>
						</div>
		    		</li>
					
					<?php 
					endwhile; 
					
					
?>
		    		
		    	</ul>
		    </div>
		</div>
	</div>
	<?php 
				
					endif;
					
?>
	<?php if(get_field('show_testimonials',$pageID)==1){?>
<?php get_sidebar('testimonials');?>

<?php }?>
<?php get_sidebar('request_form');?>
<div class="our-cctv-services spf-page">
  <div class="container">
     <div class="our-cctv-services-row">
	    <div class="iconow">
				<img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icon.png" alt="">
		</div>
		<div class="title-sec">
			<h2><?php echo get_field('page_services_title',$pageID);?></h2>
		</div>
	 </div>
	 <div class="our-services-list-row">
        <?php if( have_rows('page_services',$pageID) ):?>
	<?php while( have_rows('page_services',$pageID) ) : the_row();?>
		<div class="our-cctv-bx">
		

		   <div class="our-cctv-inner">
		      <div class="our-cctv-img img_new">
			   <a href="<?php echo get_sub_field('service_link');?>"> <img src="<?php echo get_sub_field('services_image');?>" alt="<?php echo get_sub_field('services_name');?>"> </a>
			  </div>
			  <div class="col-cont">
			     <div class="col-icon"><img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icons-1.png" alt="camera-icons-1"></div>
				 <h6><a href="<?php echo get_sub_field('service_link');?>"><?php echo get_sub_field('services_name');?></a></h6>
			  </div>
			  
		   </div>
		  
		</div>
		
							
					<?php 
					endwhile; 
					endif;
					
?>
		
	 </div>
  </div>
</div>

	<?php if( have_rows('cctv_features',$pageID) ):?>
<div class="cctv-feature">
  <div class="container">
    <div class="cctv-feature-row">
	    <div class="our-testimonials-row">
			<div class="iconow">
					<img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icon.png" alt="camera-icon">
			</div>
			<div class="title-sec">
				<h2><?php echo get_field('cctv_features_title',$pageID);?></h2>
			</div>
	    </div>
				<div class="cctv-feature-list-row">
			<?php while( have_rows('cctv_features',$pageID) ) : the_row();?>

		   <div class="cctv-feature-bx">
		   
		     <div class="cctv-feature-inner">
			    <div class="cctv-feature-img">
				  	<a href="<?php echo get_sub_field('cctv_features_link');?>"> <img src="<?php echo get_sub_field('cctv_features_image');?>" alt="cctv-img-3">	 </a>
				</div>
				<div class="cctv-feature-cont">
				  <h4><a href="<?php echo get_sub_field('cctv_features_link');?>"><?php echo get_sub_field('cctv_features_title');?></a></h4>
				  <p><?php echo get_sub_field('cctv_features_text');?> </p>
				</div>
			 </div>
		
		   </div>
		      
		   <?php 
					endwhile; 
				
					
?>
		
		</div>
	</div>
  </div>
</div>
<?php endif;?>
	<?php if(get_field('after_features_section',$pageID)!=""){?>
<div class="how-can-we-help-sec">
  <div class="container">
     <div class="hcwh-row">
	 <?php echo get_field('after_features_section',$pageID);?>
		
	 </div>
  </div>
</div>
	<?php } ?>
<div class="newsletter">
  <div class="container">
     <div class="newsletter-row">
	    <div class="newsletter-left">
		  <h4><?php echo get_field('call_to_action_section_title',$pageID);?></h4>
		  <p><?php echo get_field('call_to_action_section_subtitle',$pageID);?></p>
		</div>
		<div class="newsletter-right">
	       <div class="make-an-inquiry-btn"><a href="<?php echo get_permalink(641);?>">CONTACT US </a></div>
		</div>
	 </div>
  </div>
</div>

<?php get_sidebar('brand');?>

<style>
.accordion {
  cursor: pointer;
  width: 100%;
  text-align: left;
  outline: none;
  transition: 0.4s;
}

.panel {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>




<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

<?php get_footer( );
	
	
	