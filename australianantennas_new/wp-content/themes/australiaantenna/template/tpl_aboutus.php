<?php
/**
 * Template Name: About Us
 */

get_header();
$pageID=get_the_ID();

    $bannerurl = get_field('banner_image',$pageID); 

    if( empty( $bannerurl )) {
        $bannerurl = 'https://www.australianantennas.com.au/wp-content/themes/australiaantenna/assets//images/inner-banner.jpg';

    }

$antennaimg=get_stylesheet_directory_uri().'/images/antenna.png';
$antennaimg60=get_stylesheet_directory_uri().'/images/antenna_round.png';
?>

<section class="inner-banner-part defult_page_banner about-inner-banner" style="background-image: url(<?php echo $bannerurl; ?>);">

    <div class="container">

        <h1><?php the_title(); ?></h1>

    </div>  

</section>

<div class="our-managing-director-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Message from Our Managing Director</h2>
	  </div>
	  <div class="our-managing-director-inner">
		<div class="our-managing-director-left">
	       <div class="imgbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/Matthew-McKie.png" alt="Matthew-McKie"></div>
		   <div class="imgbx-figcation"><h4>Matthew McKie</h4></div>
		</div>
	    <div class="our-managing-director-right">
			<p>We started Australian Antennas in 1986 with a simple mission: <u>to bring connectivity into people's
			homes</u>. In 2021, this mission is even more applicable than it was 35+ years ago.</p>
			<p>Through the advancement of technology, we've evolved into one of Australia's industry leading
			companies - specializing in Security & TV Connectivity services for Commercial & Residential
			clients. Whilst it's a long way from our roots as Antenna Installers, our company core values have
			remained the same, ensuring our longevity.</p>
		    <p>Navigating the recent Covid-19 Pandemic, supply-side disruptions and security threats, among
			others, has presented unique challenges. However, challenges are inevitable and will continue to
			arise, as they have over the journey. By controlling what we can control - a client first philosophy
			and an extreme dedication to quality, will ensure our team continues to excel in the provision of
			Security and/or Connectivity related products.</p>
			<p>Today, Australian Security & Antennas is the choice of Australia's leading Companies, Builders,
			Real Estate Agents, Body Corporates and Individual Home Owners. Whether you are a potential
			customer, business partner or future employee, we look forward to providing exceptional value
			and finding out how we can work together..</p>
			<div class="managing-director-sign">
			  <p>Matthew McKie <span>Managing Director</span></p>
			</div>
		</div>
	  </div>
   </div>
</div>

<div class="company-philosophy-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Company Philosophy</h2>
	  </div>
	  <div class="company-philosophy-inner">
		<div class="company-philosophy-left">
		   <p>The Australian Security & Antennas Company Philosophy is defined by Our Mission, Our Vision and Our Core Values that define how we operate every single day.</p>
		   <p>This philosophy guides how we interact with our clients, our colleagues, and within our community. We hold each other accountable to ensure we're proud of our company.</p>
		</div>
	    <div class="company-philosophy-right">
			<ul>
			  <li>
			    <h5>Our Mission</h5>
				<div class="company-philosophy-list">
				  <div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/mission-icons.png" alt="mission-icons"> </div>
				  <div class="listrow">
				    <ol>
				      <li>To bring connectivity into homes & businesses</li>
					  <li>To make homes & business more secure and protect the community with leading Security technology</li>
					  <li>Inform, Educate & Train our customers on the various Security Solutions available</li>
					</ol>
				  </div>
				</div>
			  </li>
			  <li>
			    <h5>Our Vision</h5>
				<div class="company-philosophy-list">
				  <div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/vision-icons.png" alt="vision-icons"></div>
				  <div class="listrow">
				    <p>Australian Security & Antennas is committed to the ongoing improvement of services and dedication to quality that we provide our clients. Our vision is to be the leading integrated
                    Security company and Antenna Specialists, with a reputation for quality, service and reliability to our residential, commercial and industrial clients.</p>
				  </div>
				</div>
			  </li>
			  <li>
			    <h5>Our Core Values</h5>
				<div class="company-philosophy-list">
				  <div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/cor-value-icons.png" alt="cor-value-icons"></div>
				  <div class="listrow">
				    <ol>
				      <li>Value for Money</li>
					  <li>Extreme Dedication to Quality Services & Care</li>
					  <li>Integrity, Trust & Honesty</li>
					  <li>Continual Quality Improvement, Innovation & Best Practice</li>
					  <li>Social Responsibility</li>
					  <li>Respectful and Person Centered</li>
					</ol>
				  </div>
				</div>
			  </li>
			</ul>
		</div>
	  </div>
   </div>
</div>

<div class="security-division-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Security Division: CCTV, Alarms, Intercoms & Access Control</h2>
	  </div>
	  <div class="security-division-inner">
		<div class="security-division-left">
		   <p>Australian Security & Antennas provides Professional Security Services with a focus on
            CCTV & Surveillance, Alarm Systems, Intercom Systems & Access Control.</p>
		   <p>Our team members are all Security Licensed Integration Experts with security experience
            across Residential, Commercial and Industrial premises.</p>
		</div>
	    <div class="security-division-right">
			<div class="imgbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/security-division-img.png" alt="security-division-img"></div>
		</div>
	  </div>
	  <div class="security-division-row">
	    <ul>
	      <li>
		    <div class="security-division-bx">
			  <h5>CCTV & Surveillance</h5>
			<p>We specialize in installing, repairing and programming the World's leading CCTV & Surveillance Technology brands.</p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/cctv-surveillance-icons.png" alt="cctv-surveillance-icons"></div>
			</div>
		  </li>
		  <li>
		    <div class="security-division-bx">
		    <h5>Alarms</h5>
			<p>Australian Security & Antennas Integration Specialists excel in providing new Alarm installs, repairs & programming solutions.</p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/alarms-icons.png" alt="alarms-icons"></div></div>
		  </li>
		  <li>
		    <div class="security-division-bx">
		    <h5>Intercoms & Access Control</h5>
			<p>Our team are experts in Intercoms & Access Control Systems across residential premises and commercial sites.</p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/cor-value-icons-1.png" alt="cor-value-icons-1"></div></div>
		  </li>
		</ul>
	  </div>
   </div>
</div>

<div class="security-division-sec antennas-division-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Antennas Division: Antennas & TV Reception</h2>
	  </div>
	  <div class="security-division-inner">
		<div class="security-division-left">
		   <p>Australian Security & Antennas also specializes in the following services across Melbourne:</p>
		   <div class="listrow">
		   <ul>
		     <li>TV Antenna Installation;</li>
			 <li>MATV Communal Antenna (Units/Apartments);</li>
			 <li>TV Reception Repairs/Improvements/Troubleshooting;</li>
			 <li>Wall Mounting TVs/Home Theatre;</li>
			 <li>TV Points & More!</li>
		   </ul>
		   </div>
		   <p>We are Melbourne's leading Antenna Company, operating since 1986 & offering Australian-made
            Antennas with a 10 year warranty.</p>
		</div>
	    <div class="security-division-right">
			<div class="imgbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/antennas-division.png" alt="antennas-division"></div>
		</div>
	  </div>
	  <div class="security-division-row">
	    <ul>
	      <li>
		    <div class="security-division-bx">
		    <h5>TV Antenna Installation</h5>
			<p>We specialize in installing high-quality, durable and reliable Australian-made
             Antennas on homes & businesses throughout Melbourne<p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/TV-Antenna-Installation-icons.png" alt="TV-Antenna-Installation-icons"></div></div>
		  </li>
		  <li>
		    <div class="security-division-bx">
		    <h5>MATV Communal Antennas</h5>
			<p>Our highly experienced team are experts at MATV Communal Antenna installations,
            distribution amplifiers, TV Reception Repairs and Troubleshooting .<p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/MATV-Communal-Antennas-icons.png" alt="MATV-Communal-Antennas-icons"></div></div>
		  </li>
		  <li>
		    <div class="security-division-bx">
		    <h5>Mounting TVs, Points & Repairs!</h5>
			<p>We also offer TV Mounting Services, additional TV and Data Point Installations & General TV Reception Repairs with onsite attendance available at short notice.<p>
			<div class="iconbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/Mounting-TV-icons.png" alt="Mounting-TV-icons"></div></div>
		  </li>
		</ul>
	  </div>
   </div>
</div>


<div class="security-division-sec quality-system-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Quality Systems & Certification</h2>
	  </div>
	  <div class="security-division-inner">
		<div class="security-division-left">
		   <div class="imgbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/certification-img.png" alt="certification-img"></div>
		</div>
	    <div class="security-division-right">
			<p>Australian Security & Antennas has implemented a specialized Quality Management System based on the ISO 9001:2015 and Six Sigma framework but tailored specifically to our operations. Through the implementation of organizational processes, internal controls, people, resources and goals with defined output specifications focused on producing a specified output, quality management is ensured.</p>
			<p>Occupational Health & Safety represents a key pillar of performance for Australian Security &
            Antennas. We've implemented a comprehensive health & safety system covering daily operations, intervention plans, fatal hazard identification and management standards.</p>
			<p>Australian Security & Antennas is a member of and/or certified by the following:</p>
			<div class="listrow">
			   <ul>
				 <li><strong>ASIAL</strong> (Australian Security Industry Association Limited) - Corporate Member</li>
				 <li><strong>ACMA</strong> (Australian Communications & Media Authority) - Cabling Licensing</li>
				 <li><strong>Private Security Business Registration</strong> #944-612-305</li>
				 <li><strong>Registered Electrical Contractor</strong> #28291</li>
				 <li>All Employees have current <strong>Private Security Licenses</strong>, updated <strong>Victoria Police Checks</strong> and hold <strong>Working with Children</strong> Checks</li>
				 <li><strong>$20 Million Property & Public Liability Insurance</strong></li>
			   </ul>
		   </div>
		</div>
	  </div>
   </div>
</div>


<div class="security-division-sec social-responsibility-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Social Responsibility</h2>
	  </div>
	  <div class="security-division-inner">
		<div class="security-division-left">
		   <div class="imgbx"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/social-responsibility-img.png" alt="social-responsibility-img"></div>
		</div>
	    <div class="security-division-right">
			<p>At Australian Security & Antennas, we make a concerted effort to be an outstanding corporate citizen that's trusted & respected by our community. We strive to provide a quality service and contribute to its sustainable development including some of the following actions:</p>
			<p>Australian Security & Antennas is a member of and/or certified by the following:</p>
			<div class="listrow">
			   <ul>
				 <li><strong>Supporting Local Businesses</strong> by only purchasing from Local Suppliers as well as efforts to buy 'Made in Australia' products</li>
				 <li><strong>Commitment to Waste Reduction</strong></li>
				 <li><strong>Empowering employees</strong> (by providing career opportunities through diversity & inclusion, a focus on workplace safety and ongoing training & personal development.</li>
				 <li>Conducting ourselves in a <strong>legal, trustworthy, ethical & transparent</strong> manner across all facets of our business and social interactions.</li>
			   </ul>
		   </div>
		</div>
	  </div>
   </div>
</div>

<div class="company-profile-responsibility-our-clients-sec">
   <div class="container">
      <div class="iconow"> <img class=" ls-is-cached lazyloaded" src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" data-src="https://www.australianantennas.com.au/wp-content/themes/australiaantenna/images/antenna.png" alt=""></div>
      <div class="title-sec">
	    <h2>Company Profile: Our Clients</h2>
		<p>Australian Security & Antennas is Melbourne's leading Security & Antenna Expert, trusted by some of Australia's leading groups.<p>
	  </div>
	  <div class="clslider_full">
	  <?php echo do_shortcode('[logoshowcase slides_column="4" autoplay="true" autoplay_interval="2000" loop="true"]');?>
	  </div>
	  
	  
	  
	  <!--<div class="our-clients-slider owl-carousel owl-theme">
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/ace-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/barryplant-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/buxton-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/highcurts-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/hodges-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/jelliscraig-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/mbcm-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/metricon-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/raywhite-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/salvation-img.png" alt=""></div>
		<div class="items"><img src="https://www.australianantennas.com.au/wp-content/uploads/2021/07/simonds-img.png" alt=""></div>
	  </div>-->
   </div>
</div>














<?php get_footer( );