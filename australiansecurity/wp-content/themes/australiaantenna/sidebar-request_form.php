   <section class="quote-form_section">
	  <div class="container">
	     <div class="quote-form  quote-form_footer">
		 			<div class="iconow">
				<img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/03/camera-icon.png" alt="">
			</div>
			<div class="title-sec">
	    <h2>Request a FREE Quote</h2>
				
			</div>
    
        <?php 
            $contac_form = get_field( 'contact_form', 'options' ); 
            echo do_shortcode( '[contact-form-7 id="'.$contac_form->ID.'"]' ); 
        ?>
    </div>
 </div>
 </section>
