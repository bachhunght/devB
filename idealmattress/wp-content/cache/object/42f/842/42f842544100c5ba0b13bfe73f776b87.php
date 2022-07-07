³\b<?php exit; ?>a:1:{s:7:"content";a:41:{i:0;a:11:{s:2:"id";i:1000;s:6:"handle";s:10:"hesperiden";s:4:"type";s:6:"arrows";s:4:"name";s:10:"Hesperiden";s:3:"css";s:626:".hesperiden.tparrows {
	cursor:pointer;
	background:##bg-color##;
	width:##bg-size##px;
	height:##bg-size##px;
	position:absolute;
	display:block;
	z-index:1000;
    border-radius: 50%;
}
.hesperiden.tparrows.rs-touchhover {
	background:##hover-bg-color##;
}
.hesperiden.tparrows:before {
	font-family: 'revicons';
	font-size:##arrow-size##px;
	color:##arrow-color##;
	display:block;
	line-height: ##bg-size##px;
	text-align: center;
}
.hesperiden.tparrows.tp-leftarrow:before {
	content: '##left-icon##';
    margin-left:-3px;
}
.hesperiden.tparrows.tp-rightarrow:before {
	content: '##right-icon##';
    margin-right:-3px;
}";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:7:{s:8:"bg-color";a:3:{s:5:"title";s:8:"BG-Color";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:7:"bg-size";a:3:{s:5:"title";s:7:"BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"40";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"20";}s:14:"hover-bg-color";a:3:{s:5:"title";s:14:"Hover-BG-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e82c";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e82d";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:1;a:11:{s:2:"id";i:1002;s:6:"handle";s:5:"hades";s:4:"type";s:6:"arrows";s:4:"name";s:5:"Hades";s:3:"css";s:1708:".hades.tparrows {
	cursor:pointer;
	background:##bg##;
	width:100px;
	height:100px;
	position:absolute;
	display:block;
	z-index:1000;
}

.hades.tparrows:before {
	font-family: 'revicons';
	font-size:30px;
	color:##acolor##;
	display:block;
	line-height: 100px;
	text-align: center;
  transition: background 0.3s, color 0.3s;
}
.hades.tparrows.tp-leftarrow:before {
	content: '##left-icon##';
}
.hades.tparrows.tp-rightarrow:before {
	content: '##right-icon##';
}

.hades.tparrows.rs-touchhover:before {
   color:##harrow##;
   background:##hbg##;
 }
.hades .tp-arr-allwrapper {
  position:absolute;
  left:100%;
  top:0px;
  background:#888; 
  width:100px;height:100px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  -ms-filter: 'progid:dximagetransform.microsoft.alpha(opacity=0)';
  filter: alpha(opacity=0);
  -moz-opacity: 0.0;
  -khtml-opacity: 0.0;
  opacity: 0.0;
  -webkit-transform: rotatey(-90deg);
  transform: rotatey(-90deg);
  -webkit-transform-origin: 0% 50%;
  transform-origin: 0% 50%;
}
.hades.tp-rightarrow .tp-arr-allwrapper {
   left:auto;
   right:100%;
   -webkit-transform-origin: 100% 50%;
  transform-origin: 100% 50%;
   -webkit-transform: rotatey(90deg);
  transform: rotatey(90deg);
}

.hades:hover .tp-arr-allwrapper {
   -ms-filter: 'progid:dximagetransform.microsoft.alpha(opacity=100)';
  filter: alpha(opacity=100);
  -moz-opacity: 1;
  -khtml-opacity: 1;
  opacity: 1;  
    -webkit-transform: rotatey(0deg);
  transform: rotatey(0deg);

 }
    
.hades .tp-arr-iwrapper {
}
.hades .tp-arr-imgholder {
  background-size:cover;
  position:absolute;
  top:0px;left:0px;
  width:100%;height:100%;
}
.hades .tp-arr-titleholder {
}
.hades .tp-arr-subtitleholder {
}
";s:6:"markup";s:76:"<div class="tp-arr-allwrapper">
	<div class="tp-arr-imgholder"></div>
</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:2:"bg";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:6:"acolor";a:3:{s:5:"title";s:5:"Arrow";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:6:"harrow";a:3:{s:5:"title";s:11:"Hover-Arrow";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:3:"hbg";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:2;a:11:{s:2:"id";i:1003;s:6:"handle";s:4:"ares";s:4:"type";s:6:"arrows";s:4:"name";s:4:"Ares";s:3:"css";s:2107:".ares.tparrows {
	cursor:pointer;
	background:##bg-color##;
	min-width:##bg-size##px;
    min-height:##bg-size##px;
	position:absolute;
	display:block;
	z-index:1000;
    border-radius:50%;
}
.ares.tparrows.rs-touchhover {
}
.ares.tparrows:before {
	font-family: 'revicons';
	font-size:##arrow-size##px;
	color:##arrowcolor##;
	display:block;
	line-height: ##bg-size##px;
	text-align: center;
    -webkit-transition: color 0.3s;
    -moz-transition: color 0.3s;
    transition: color 0.3s;
    z-index:2;
    position:relative;
}
.ares.tparrows.tp-leftarrow:before {
	content: '##left-icon##';
}
.ares.tparrows.tp-rightarrow:before {
	content: '##right-icon##';
}
.ares.tparrows.rs-touchhover:before {
 color:##hover-arrow-color##;
      }
.tp-title-wrap { 
  position:absolute;
  z-index:1;
  display:inline-block;
  background:##bg-color##;
  min-height:##bg-size##px;
  line-height:##bg-size##px;
  top:0px;
  margin-left:30px;
  border-radius:0px 30px 30px 0px;
  overflow:hidden;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transform:scalex(0);  
  -webkit-transform:scalex(0);  
  transform-origin:0% 50%; 
   -webkit-transform-origin:0% 50%;
}
 .ares.tp-rightarrow .tp-title-wrap { 
   right:0px;
   margin-right:30px;margin-left:0px;
   -webkit-transform-origin:100% 50%;
border-radius:30px 0px 0px 30px;
 }
.ares.tparrows.rs-touchhover .tp-title-wrap {
	transform:scalex(1) scaley(1);
  	-webkit-transform:scalex(1) scaley(1);
}
.ares .tp-arr-titleholder {
  position:relative;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transform:translatex(200px);  
  text-transform:uppercase;
  color:##hover-title-color##;
  font-weight:400;
  font-size:14px;
  line-height:60px;
  white-space:nowrap;
  padding:0px 20px;
  margin-left:10px;
  opacity:0;
}

.ares.tp-rightarrow .tp-arr-titleholder {
   transform:translatex(-200px); 
   margin-left:0px; margin-right:10px;
      }

.ares.tparrows.rs-touchhover .tp-arr-titleholder {
   transform:translatex(0px);
   -webkit-transform:translatex(0px);
  transition-delay: 0.1s;
  opacity:1;
}";s:6:"markup";s:87:"<div class="tp-title-wrap">
	<span class="tp-arr-titleholder">{{title}}</span>
 </div>
";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:8:{s:8:"bg-color";a:3:{s:5:"title";s:8:"BG-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:7:"bg-size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"25";}s:17:"hover-arrow-color";a:3:{s:5:"title";s:11:"Hover-Arrow";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:17:"hover-title-color";a:3:{s:5:"title";s:11:"Hover-Title";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:10:"arrowcolor";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#aaaaaa";}s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e81f";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e81e";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:3;a:11:{s:2:"id";i:1004;s:6:"handle";s:4:"hebe";s:4:"type";s:6:"arrows";s:4:"name";s:4:"Hebe";s:3:"css";s:2270:".hebe.tparrows {
  cursor:pointer;
  background:##back-color##;
  min-width:##back-size##px;
  min-height:##back-size##px;
  position:absolute;
  display:block;
  z-index:1000;
}
.hebe.tparrows.rs-touchhover {
}
.hebe.tparrows:before {
  font-family: 'revicons';
  font-size:##arrow-size##px;
  color:##arrow-color##;
  display:block;
  line-height: ##back-size##px;
  text-align: center;
  -webkit-transition: color 0.3s;
  -moz-transition: color 0.3s;
  transition: color 0.3s;
  z-index:2;
  position:relative;
   background:##back-color##;
  min-width:##back-size##px;
    min-height:##back-size##px;
}
.hebe.tparrows.tp-leftarrow:before {
  content: '##left-icon##';
}
.hebe.tparrows.tp-rightarrow:before {
  content: '##right-icon##';
}
.hebe.tparrows.rs-touchhover:before {
 color:#000;
      }
.tp-title-wrap { 
  position:absolute;
  z-index:0;
  display:inline-block;
  background:#000;
  background:##title-wrap-color##;
  min-height:60px;
  line-height:60px;
  top:-10px;
  margin-left:0px;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transform:scalex(0);  
  -webkit-transform:scalex(0);  
  transform-origin:0% 50%; 
   -webkit-transform-origin:0% 50%;
}
 .hebe.tp-rightarrow .tp-title-wrap { 
   right:0px;
   -webkit-transform-origin:100% 50%;
 }
.hebe.tparrows.rs-touchhover .tp-title-wrap {
  transform:scalex(1);
  -webkit-transform:scalex(1);
}
.hebe .tp-arr-titleholder {
  position:relative;
  text-transform:uppercase;
  color:##title-color##;
  font-weight:600;
  font-size:##title-size##px;
  line-height:##image-size##px;
  white-space:nowrap;
  padding:0px 20px 0px ##image-size##px;
}

.hebe.tp-rightarrow .tp-arr-titleholder {
   margin-left:0px; 
   padding:0px ##image-size##px 0px 20px;
 }

.hebe.tparrows.rs-touchhover .tp-arr-titleholder {
   transform:translatex(0px);
   -webkit-transform:translatex(0px);
  transition-delay: 0.1s;
  opacity:1;
}

.hebe .tp-arr-imgholder{
      width:##image-size##px;
      height:##image-size##px;
      position:absolute;
      left:100%;
      display:block;
      background-size:cover;
      background-position:center center;
  	 top:0px; right:-##image-size##px;
    }
.hebe.tp-rightarrow .tp-arr-imgholder{
        right:auto;left:-##image-size##px;
      }";s:6:"markup";s:130:"<div class="tp-title-wrap">
	<span class="tp-arr-titleholder">{{title}}</span>
    <span class="tp-arr-imgholder"></span>
 </div>
";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:10:{s:9:"back-size";a:3:{s:5:"title";s:7:"BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"70";}s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"30";}s:10:"image-size";a:3:{s:5:"title";s:10:"Image-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"90";}s:16:"title-wrap-color";a:3:{s:5:"title";s:19:"Title-Wrap-BG-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.75)";}s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"title-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:4;a:11:{s:2:"id";i:1005;s:6:"handle";s:6:"hermes";s:4:"type";s:6:"arrows";s:4:"name";s:6:"Hermes";s:3:"css";s:2679:".hermes.tparrows {
	cursor:pointer;
	background:##back-color##;
	width:##width##px;
	height:##height##px;
	position:absolute;
	display:block;
	z-index:1000;
}

.hermes.tparrows:before {
	font-family: 'revicons';
	font-size:##arrow-size##px;
	color:##arrow-color##;
	display:block;
	line-height: ##height##px;
	text-align: center;
    transform:translatex(0px);
    -webkit-transform:translatex(0px);
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
}
.hermes.tparrows.tp-leftarrow:before {
	content: '##left-icon##';
}
.hermes.tparrows.tp-rightarrow:before {
	content: '##right-icon##';
}
.hermes.tparrows.tp-leftarrow.rs-touchhover:before {
    transform:translatex(-20px);
    -webkit-transform:translatex(-20px);
     opacity:0;
}
.hermes.tparrows.tp-rightarrow.rs-touchhover:before {
    transform:translatex(20px);
    -webkit-transform:translatex(20px);
     opacity:0;
}

.hermes .tp-arr-allwrapper {
    overflow:hidden;
    position:absolute;
	width:##wrapper-width##px;
    height:##wrapper-height##px;
    top:0px;
    left:0px;
    visibility:hidden;
      -webkit-transition: -webkit-transform 0.3s 0.3s;
  transition: transform 0.3s 0.3s;
  -webkit-perspective: 1000px;
  perspective: 1000px;
    }
.hermes.tp-rightarrow .tp-arr-allwrapper {
   right:0px;left:auto;
      }
.hermes.tparrows.rs-touchhover .tp-arr-allwrapper {
   visibility:visible;
          }
.hermes .tp-arr-imgholder {
  width:##wrapper-width##px;position:absolute;
  left:0px;top:0px;height:##height##px;
  transform:translatex(-##wrapper-width##px);
  -webkit-transform:translatex(-##wrapper-width##px);
  transition:all 0.3s;
  transition-delay:0.3s;
}
.hermes.tp-rightarrow .tp-arr-imgholder{
    transform:translatex(##wrapper-width##px);
  -webkit-transform:translatex(##wrapper-width##px);
      }
  
.hermes.tparrows.rs-touchhover .tp-arr-imgholder {
   transform:translatex(0px);
   -webkit-transform:translatex(0px);            
}
.hermes .tp-arr-titleholder {
  top:##height##px;
  width:##wrapper-width##px;
  text-align:left; 
  display:block;
  padding:0px 10px;
  line-height:30px; background:#000;
  background:##title-back-color##;
  color:##title-font-color##;
  font-weight:600; position:absolute;
  font-size:##title-size##px;
  white-space:nowrap;
  letter-spacing:1px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  -webkit-transform: rotatex(-90deg);
  transform: rotatex(-90deg);
  -webkit-transform-origin: 50% 0;
  transform-origin: 50% 0;
  box-sizing:border-box;

}
.hermes.tparrows.rs-touchhover .tp-arr-titleholder {
    -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
  -webkit-transform: rotatex(0deg);
  transform: rotatex(0deg);
}
";s:6:"markup";s:126:"<div class="tp-arr-allwrapper">
	<div class="tp-arr-imgholder"></div>
	<div class="tp-arr-titleholder">{{title}}</div>	
</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:12:{s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:5:"width";a:3:{s:5:"title";s:5:"Width";s:4:"type";s:6:"custom";s:4:"data";s:2:"30";}s:6:"height";a:3:{s:5:"title";s:6:"Height";s:4:"type";s:6:"custom";s:4:"data";s:3:"110";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}s:14:"wrapper-height";a:3:{s:5:"title";s:14:"Wrapper-Height";s:4:"type";s:6:"custom";s:4:"data";s:3:"140";}s:13:"wrapper-width";a:3:{s:5:"title";s:13:"Wrapper-Width";s:4:"type";s:6:"custom";s:4:"data";s:3:"180";}s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}s:10:"title-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:16:"title-back-color";a:3:{s:5:"title";s:16:"Title-Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.75)";}s:16:"title-font-color";a:3:{s:5:"title";s:16:"Title-Font-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:5;a:11:{s:2:"id";i:1006;s:6:"handle";s:6:"custom";s:4:"type";s:6:"arrows";s:4:"name";s:6:"Custom";s:3:"css";s:496:".custom.tparrows {
	cursor:pointer;
	background:#000;
	background:rgba(0,0,0,0.5);
	width:40px;
	height:40px;
	position:absolute;
	display:block;
	z-index:1000;
}
.custom.tparrows.rs-touchhover {
	background:#000;
}
.custom.tparrows:before {
	font-family: 'revicons';
	font-size:15px;
	color:#fff;
	display:block;
	line-height: 40px;
	text-align: center;
}
.custom.tparrows.tp-leftarrow:before {
	content: '##left-icon##';
}
.custom.tparrows.tp-rightarrow:before {
	content: '##right-icon##';
}

";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:2:{s:9:"left-icon";a:3:{s:5:"title";s:9:"Left-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:10:"right-icon";a:3:{s:5:"title";s:10:"Right-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:6;a:11:{s:2:"id";i:1007;s:6:"handle";s:10:"hephaistos";s:4:"type";s:6:"arrows";s:4:"name";s:10:"Hephaistos";s:3:"css";s:624:".hephaistos.tparrows {
	cursor:pointer;
	background:##back-color##;
	width:##back-size##px;
	height:##back-size##px;
	position:absolute;
	display:block;
	z-index:1000;
    border-radius:50%;
}
.hephaistos.tparrows.rs-touchhover {
	background:##back-hover##;
}
.hephaistos.tparrows:before {
	font-family: 'revicons';
	font-size:18px;
	color:##arrow-color##;
	display:block;
	line-height: ##back-size##px;
	text-align: center;
}
.hephaistos.tparrows.tp-leftarrow:before {
	content: '##left-arrow##';
    margin-left:-2px;
  
}
.hephaistos.tparrows.tp-rightarrow:before {
	content: '##right-arrow##';
    margin-right:-2px;
}

";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:9:"back-size";a:3:{s:5:"title";s:7:"BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"40";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"back-hover";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:10:"left-arrow";a:3:{s:5:"title";s:10:"Left-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e82c";}s:11:"right-arrow";a:3:{s:5:"title";s:11:"Right-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e82d";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:7;a:11:{s:2:"id";i:1008;s:6:"handle";s:10:"persephone";s:4:"type";s:6:"arrows";s:4:"name";s:10:"Persephone";s:3:"css";s:605:".persephone.tparrows {
	cursor:pointer;
	background:##back-color##;
	width:##back-size##px;
	height:##back-size##px;
	position:absolute;
	display:block;
	z-index:1000;
    border:1px solid ##border-rgba##;
}
.persephone.tparrows.rs-touchhover {
	background:##back-hover##;
}
.persephone.tparrows:before {
	font-family: 'revicons';
	font-size:##arrow-size##px;
	color: ##arrow-color##;
	display:block;
	line-height: ##back-size##px;
	text-align: center;
}
.persephone.tparrows.tp-leftarrow:before {
	content: '##left-arrow##';
}
.persephone.tparrows.tp-rightarrow:before {
	content: '##right-arrow##
';
}

";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:8:{s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:22:"rgba(201,201,201,0.75)";}s:9:"back-size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"40";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}s:10:"back-hover";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:11:"border-rgba";a:3:{s:5:"title";s:6:"Border";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"left-arrow";a:3:{s:5:"title";s:10:"Left-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:11:"right-arrow";a:3:{s:5:"title";s:11:"Right-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:8;a:11:{s:2:"id";i:1009;s:6:"handle";s:7:"erinyen";s:4:"type";s:6:"arrows";s:4:"name";s:7:"Erinyen";s:3:"css";s:2561:".erinyen.tparrows {
  cursor:pointer;
  background:##back-color##;
  min-width:##back-size##px;
  min-height:##back-size##px;
  position:absolute;
  display:block;
  z-index:1000;
  border-radius:50%;   
}

.erinyen.tparrows:before {
  font-family: 'revicons';
  font-size:##arrow-size##px;
  color:##arrow-color##;
  display:block;
  line-height:##back-size##px;
  text-align: center;    
  z-index:2;
  position:relative;
}
.erinyen.tparrows.tp-leftarrow:before {
  content: '##leftarrow##';
}
.erinyen.tparrows.tp-rightarrow:before {
  content: '##right-arrow##';
}

.erinyen .tp-title-wrap { 
  position:absolute;
  z-index:1;
  display:inline-block;
  background:rgba(0,0,0,0.5);
  min-height:##back-size##px;
  line-height:##back-size##px;
  top:0px;
  margin-left:0px;
  border-radius:##title-wrap-border-radius##px;
  overflow:hidden; 
  transition: opacity 0.3s;
  -webkit-transition:opacity 0.3s;
  -moz-transition:opacity 0.3s;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  transform: scale(0);  
  visibility:hidden;
  opacity:0;
}

.erinyen.tparrows.rs-touchhover .tp-title-wrap{
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  transform: scale(1);
  opacity:1;
  visibility:visible;
}
        
 .erinyen.tp-rightarrow .tp-title-wrap { 
   right:0px;
   margin-right:0px;margin-left:0px;
   -webkit-transform-origin:100% 50%;
  border-radius:##title-wrap-border-radius##px;
  padding-right:20px;
  padding-left:10px;
 }


.erinyen.tp-leftarrow .tp-title-wrap { 
   padding-left:20px;
  padding-right:10px;
}

.erinyen .tp-arr-titleholder {
  letter-spacing: ##letter-spacing##px;
   position:relative;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  transform:translatex(200px);  
  text-transform:uppercase;
  color:##arrow-color##;
  font-weight:600;
  font-size:##font-size##px;
  line-height:##back-size##px;
  white-space:nowrap;
  padding:0px 20px;
  margin-left:11px;
  opacity:0;  
}

.erinyen .tp-arr-imgholder {
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
  background-position:center center;
  background-size:cover;
    }
 .erinyen .tp-arr-img-over {
   width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
   background:##overlay-rgba##;
 }
.erinyen.tp-rightarrow .tp-arr-titleholder {
   transform:translatex(-200px); 
   margin-left:0px; margin-right:11px;
      }

.erinyen.tparrows.rs-touchhover .tp-arr-titleholder {
   transform:translatex(0px);
   -webkit-transform:translatex(0px);
  transition-delay: 0.1s;
  opacity:1;
}";s:6:"markup";s:168:"<div class="tp-title-wrap">
  	<div class="tp-arr-imgholder"></div>
    <div class="tp-arr-img-over"></div>
	<span class="tp-arr-titleholder">{{title}}</span>
 </div>

";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:10:{s:10:"back-color";a:3:{s:5:"title";s:7:"BG-RGBA";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.5)";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"back-size";a:3:{s:5:"title";s:7:"BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"70";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"20";}s:9:"font-size";a:3:{s:5:"title";s:15:"Title-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:24:"title-wrap-border-radius";a:3:{s:5:"title";s:24:"Title-Wrap-Border-Radius";s:4:"type";s:6:"custom";s:4:"data";s:2:"35";}s:9:"leftarrow";a:3:{s:5:"title";s:10:"Left-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:11:"right-arrow";a:3:{s:5:"title";s:11:"Right-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}s:14:"letter-spacing";a:3:{s:5:"title";s:14:"Letter-Spacing";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:12:"overlay-rgba";a:3:{s:5:"title";s:7:"Overlay";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.51)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:9;a:11:{s:2:"id";i:1010;s:6:"handle";s:4:"zeus";s:4:"type";s:6:"arrows";s:4:"name";s:4:"Zeus";s:3:"css";s:1576:".zeus.tparrows {
  cursor:pointer;
  min-width:##bg-size##px;
  min-height:##bg-size##px;
  position:absolute;
  display:block;
  z-index:1000;
  border-radius:50%;   
  overflow:hidden;
  background:##bg-color##;
}

.zeus.tparrows:before {
  font-family: 'revicons';
  font-size:##arrow-size##px;
  color:##arrow-color##;
  display:block;
  line-height: ##bg-size##px;
  text-align: center;    
  z-index:2;
  position:relative;
}
.zeus.tparrows.tp-leftarrow:before {
  content: '##left-arrow##';
}
.zeus.tparrows.tp-rightarrow:before {
  content: '##right-arrow##';
}

.zeus .tp-title-wrap {
  background:rgba(0,0,0,0.5);
  width:100%;
  height:100%;
  top:0px;
  left:0px;
  position:absolute;
  opacity:0;
  transform:scale(0);
  -webkit-transform:scale(0);
   transition: all 0.3s;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;
   border-radius:50%;
 }
.zeus .tp-arr-imgholder {
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
  background-position:center center;
  background-size:cover;
  border-radius:50%;
  transform:translatex(-100%);
  -webkit-transform:translatex(-100%);
   transition: all 0.3s;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;

 }
.zeus.tp-rightarrow .tp-arr-imgholder {
    transform:translatex(100%);
  -webkit-transform:translatex(100%);
      }
.zeus.tparrows.rs-touchhover .tp-arr-imgholder {
  transform:translatex(0);
  -webkit-transform:translatex(0);
  opacity:1;
}
      
.zeus.tparrows.rs-touchhover .tp-title-wrap {
  transform:scale(1);
  -webkit-transform:scale(1);
  opacity:1;
}
 ";s:6:"markup";s:76:"<div class="tp-title-wrap">
  	<div class="tp-arr-imgholder"></div>
 </div>
";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:7:"bg-size";a:3:{s:5:"title";s:7:"BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"70";}s:8:"bg-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:15:"rgba(0,0,0,0.1)";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"20";}s:10:"left-arrow";a:3:{s:5:"title";s:10:"Left-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e824";}s:11:"right-arrow";a:3:{s:5:"title";s:11:"Right-Arrow";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:10;a:11:{s:2:"id";i:1011;s:6:"handle";s:5:"metis";s:4:"type";s:6:"arrows";s:4:"name";s:5:"Metis";s:3:"css";s:450:".metis.tparrows {
  background:##bg-color##;
  padding:##padding##px;
  transition:all 0.3s;
  -webkit-transition:all 0.3s;
  width:##size##px;
  height:##size##px;
  box-sizing:border-box;
 }
 
 .metis.tparrows.rs-touchhover {
   background:##bg-hover-color##;
 }
 
 .metis.tparrows:before {
  color:##arrow-color##;  
   transition:all 0.3s;
  -webkit-transition:all 0.3s;
 }
 
 .metis.tparrows.rs-touchhover:before {
   transform:scale(1.5);
  }
 ";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:5:{s:8:"bg-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:4:"size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:7:"padding";a:3:{s:5:"title";s:7:"Padding";s:4:"type";s:6:"custom";s:4:"data";s:2:"10";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:14:"bg-hover-color";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:22:"rgba(255,255,255,0.75)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:11;a:11:{s:2:"id";i:1012;s:6:"handle";s:5:"dione";s:4:"type";s:6:"arrows";s:4:"name";s:5:"Dione";s:3:"css";s:1556:".dione.tparrows {
  color:#000;
  height:100%;
  width:##width##px;
  background:transparent;
  background:##bg-color##;
  line-height:100%;
  transition:all 0.3s;
-webkit-transition:all 0.3s;
}

.dione.tparrows.rs-touchhover {
 background:##bg-color-hover##;
 }
.dione .tp-arr-imgwrapper {
 width:##width##px;
 left:0px;
 position:absolute;
 height:100%;
 top:0px;
 overflow:hidden;
 }
.dione.tp-rightarrow .tp-arr-imgwrapper {
left:auto;
right:0px;
}

.dione .tp-arr-imgholder {
background-position:center center;
background-size:cover;
width:##width##px;
height:100%;
top:0px;
visibility:hidden;
transform:translatex(-50px);
-webkit-transform:translatex(-50px);
transition:all 0.3s;
-webkit-transition:all 0.3s;
opacity:0;
left:0px;
}

.dione.tparrows.tp-rightarrow .tp-arr-imgholder {
  right:0px;
  left:auto;
  transform:translatex(50px);
 -webkit-transform:translatex(50px);
}

.dione.tparrows:before {
color:##arrow-color##;
position:absolute;
line-height:##arrow-size##px;
margin-left:-22px;
top:50%;
left:50%;
font-size:30px;
margin-top:-15px;
transition:all 0.3s;
-webkit-transition:all 0.3s;
}

.dione.tparrows.tp-rightarrow:before {
margin-left:6px;
}

.dione.tparrows.rs-touchhover:before {
  transform:translatex(-20px);
-webkit-transform:translatex(-20px);
opacity:0;
}

.dione.tparrows.tp-rightarrow.rs-touchhover:before {
  transform:translatex(20px);
-webkit-transform:translatex(20px);
}

.dione.tparrows.rs-touchhover .tp-arr-imgholder {
 transform:translatex(0px);
-webkit-transform:translatex(0px);
opacity:1;
visibility:visible;
}

";s:6:"markup";s:75:"<div class="tp-arr-imgwrapper">
<div class="tp-arr-imgholder"></div>
</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:5:{s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"30";}s:8:"bg-color";a:3:{s:5:"title";s:8:"BG-Color";s:4:"type";s:5:"color";s:4:"data";s:13:"rgba(0,0,0,0)";}s:14:"bg-color-hover";a:3:{s:5:"title";s:14:"BG-Color-Hover";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.45)";}s:5:"width";a:3:{s:5:"title";s:5:"Width";s:4:"type";s:6:"custom";s:4:"data";s:2:"90";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:12;a:11:{s:2:"id";i:1013;s:6:"handle";s:6:"uranus";s:4:"type";s:6:"arrows";s:4:"name";s:6:"Uranus";s:3:"css";s:338:".uranus.tparrows {
  width:##width##px;
  height:##height##px;
  background:##background##;
 }
 .uranus.tparrows:before {
 width:##width##px;
 height:##height##px;
 line-height:##height##px;
 font-size:##font-size##px;
 transition:all 0.3s;
-webkit-transition:all 0.3s;
 }
 
  .uranus.tparrows.rs-touchhover:before {
    opacity:0.75;
  }";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:4:{s:6:"height";a:3:{s:5:"title";s:6:"Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"50";}s:9:"font-size";a:3:{s:5:"title";s:9:"Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"40";}s:10:"background";a:3:{s:5:"title";s:8:"BG-Color";s:4:"type";s:5:"color";s:4:"data";s:19:"rgba(255,255,255,0)";}s:5:"width";a:3:{s:5:"title";s:5:"Width";s:4:"type";s:6:"custom";s:4:"data";s:2:"50";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:13;a:11:{s:2:"id";i:2000;s:6:"handle";s:10:"hesperiden";s:4:"type";s:6:"thumbs";s:4:"name";s:10:"Hesperiden";s:3:"css";s:864:".hesperiden .tp-thumb {
  opacity:1;
  -webkit-perspective: 600px;
  perspective: 600px;
}
.hesperiden .tp-thumb .tp-thumb-title {
    font-size:##title-font-size##px;
    position:absolute;
    margin-top:-10px;
    color:##title-color##;
    display:block;
    z-index:1000;
    background-color:##title-bg##;
    padding:5px 10px; 
    bottom:0px;
    left:0px;
    width:100%;
  box-sizing:border-box;
    text-align:center;
    overflow:hidden;
    white-space:nowrap;
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
    transform:rotatex(90deg) translatez(0.001px);
    transform-origin:50% 100%;
    -webkit-transform:rotatex(90deg) translatez(0.001px);
    -webkit-transform-origin:50% 100%;
    opacity:0;
 }
.hesperiden .tp-thumb.rs-touchhover .tp-thumb-title {
  	 transform:rotatex(0deg);
    -webkit-transform:rotatex(0deg);
    opacity:1;
}";s:6:"markup";s:82:"<span class="tp-thumb-image"></span>
<span class="tp-thumb-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:3:{s:8:"title-bg";a:3:{s:5:"title";s:14:"Title-BG-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.85)";}s:11:"title-color";a:3:{s:5:"title";s:16:"Title-Font-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:15:"title-font-size";a:3:{s:5:"title";s:15:"Title-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:14;a:11:{s:2:"id";i:2001;s:6:"handle";s:5:"gyges";s:4:"type";s:6:"thumbs";s:4:"name";s:5:"Gyges";s:3:"css";s:1135:".gyges .tp-thumb { 
      opacity:1
  }
.gyges .tp-thumb-img-wrap {
  padding:3px;
  background-color:##bg##;
  display:inline-block;

  width:100%;
  height:100%;
  position:relative;
  margin:0px;
  box-sizing:border-box;
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
}
.gyges .tp-thumb-image {
   padding:3px; 
   display:block;
   box-sizing:border-box;
   position:relative;
    -webkit-box-shadow: inset 5px 5px 10px 0px ##bg##;
  -moz-box-shadow: inset 5px 5px 10px 0px ##bg##;
  box-shadow: inset 5px 5px 10px 0px ##bg##;
 }  

.gyges .tp-thumb.rs-touchhover .tp-thumb-img-wrap,
 .gyges .tp-thumb.selected .tp-thumb-img-wrap {
    background: -moz-linear-gradient(top,  ##hovercolor## 0%, ##hbgb## 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, ##hovercolor##, color-stop(100%, ##hbgb##)));
background: -webkit-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -o-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -ms-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: linear-gradient(to bottom, ##hovercolor## 0%, ##hbgb## 100%);

}

";s:6:"markup";s:80:"<span class="tp-thumb-img-wrap">
  <span class="tp-thumb-image"></span>
</span>
";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:2:"70";s:6:"height";s:2:"70";}s:12:"placeholders";a:4:{s:2:"bg";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:7:"titlebg";a:3:{s:5:"title";s:16:"Title-Background";s:4:"type";s:5:"color";s:4:"data";s:22:"rgba(255,255,255,0.81)";}s:10:"hovercolor";a:3:{s:5:"title";s:9:"Hover-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:4:"hbgb";a:3:{s:5:"title";s:12:"Hover-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#777777";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:15;a:11:{s:2:"id";i:2002;s:6:"handle";s:5:"hades";s:4:"type";s:6:"thumbs";s:4:"name";s:5:"Hades";s:3:"css";s:1190:".hades .tp-thumb { 
      opacity:1
  }
.hades .tp-thumb-img-wrap {
  border-radius:##radius##;
  padding:##border##px;
  display:inline-block;
  background-color:##bg##;
  width:100%;
  height:100%;
  position:relative;
  margin:0px;
  box-sizing:border-box;
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
}
.hades .tp-thumb-image {
   padding:##border##px; 
   border-radius:##radius##;
   display:block;
   box-sizing:border-box;
   position:relative;
    -webkit-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  -moz-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
 }  


.hades .tp-thumb.rs-touchhover .tp-thumb-img-wrap,
.hades .tp-thumb.selected .tp-thumb-img-wrap {
  

  background: -moz-linear-gradient(top, ##ht## 0%, ##hb## 100%);
  background: -webkit-gradient(left top, left bottom, color-stop(0%, ##ht##, color-stop(100%, ##hb##)));
  background: -webkit-linear-gradient(top, ##ht## 0%, ##hb## 100%);
  background: -o-linear-gradient(top, ##ht## 0%, ##hb## 100%);
  background: -ms-linear-gradient(top, ##ht## 0%, ##hb## 100%);
  background: linear-gradient(to bottom, ##ht## 0%, ##hb## 100%);
 }

";s:6:"markup";s:80:"<span class="tp-thumb-img-wrap">
  <span class="tp-thumb-image"></span>
</span>
";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:2:"70";s:6:"height";s:2:"70";}s:12:"placeholders";a:5:{s:6:"radius";a:3:{s:5:"title";s:6:"Radius";s:4:"type";s:6:"custom";s:4:"data";s:3:"50%";}s:6:"border";a:3:{s:5:"title";s:6:"Border";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:2:"bg";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:2:"ht";a:3:{s:5:"title";s:9:"Hover-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:2:"hb";a:3:{s:5:"title";s:12:"Hover-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#878787";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:16;a:11:{s:2:"id";i:2009;s:6:"handle";s:7:"erinyen";s:4:"type";s:6:"thumbs";s:4:"name";s:7:"Erinyen";s:3:"css";s:1380:".erinyen .tp-thumb {
opacity:1
}

.erinyen .tp-thumb-over {
  background:##overlay-color##;
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
  z-index:1;
  -webkit-transition:all 0.3s;
  transition:all 0.3s;
}

.erinyen .tp-thumb-more:before {
  font-family: 'revicons';
  font-size:##arrow-size##px;
  color:##arrow-color##;
  display:block;
  line-height: ##lineheight##px;
  text-align: left;    
  z-index:2;
  position:absolute;
  top:20px;
  right:20px;
  z-index:2;
}
.erinyen .tp-thumb-more:before {
  content: '##thumb-more##';
}

.erinyen .tp-thumb-title {
  font-family:'##title-font##';
  letter-spacing:1px;
  font-size:##title-size##px;
  color:##title-color##;
  display:block;
  line-height: ##lineheight##px;
  text-align: left;    
  z-index:2;
  position:absolute;
  top:0px;
  left:0px;
  z-index:2;
  padding:##padding##;
  width:100%;
  height:100%;
  box-sizing:border-box;
  transition:all 0.3s;
  -webkit-transition:all 0.3s;
  font-weight:500;
}

.erinyen .tp-thumb.selected .tp-thumb-more:before,
.erinyen .tp-thumb.rs-touchhover .tp-thumb-more:before {
 color:##arrow-hover##;
}

.erinyen .tp-thumb.selected .tp-thumb-over,
.erinyen .tp-thumb.rs-touchhover .tp-thumb-over {
 background:##back-hover##;
}
.erinyen .tp-thumb.selected .tp-thumb-title,
.erinyen .tp-thumb.rs-touchhover .tp-thumb-title {
  color:##title-hover##;

}
";s:6:"markup";s:154:"<span class="tp-thumb-over"></span>
<span class="tp-thumb-image"></span>
<span class="tp-thumb-title">{{title}}</span>
<span class="tp-thumb-more"></span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"200";s:6:"height";s:3:"130";}s:12:"placeholders";a:12:{s:13:"overlay-color";a:3:{s:5:"title";s:7:"Overlay";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:11:"arrow-color";a:3:{s:5:"title";s:11:"Arrow-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#aaaaaa";}s:10:"arrow-size";a:3:{s:5:"title";s:10:"Arrow-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"title-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:11:"arrow-hover";a:3:{s:5:"title";s:11:"Hover-Arrow";s:4:"type";s:5:"color";s:4:"data";s:7:"#aaaaaa";}s:10:"back-hover";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"thumb-more";a:3:{s:5:"title";s:10:"Thumb-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}s:11:"title-hover";a:3:{s:5:"title";s:11:"Hover-Title";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:10:"title-font";a:3:{s:5:"title";s:17:"Title-Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:7:"Raleway";}s:7:"padding";a:3:{s:5:"title";s:7:"Padding";s:4:"type";s:6:"custom";s:4:"data";s:19:"20px 35px 20px 20px";}s:10:"lineheight";a:3:{s:5:"title";s:11:"Line-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:17;a:11:{s:2:"id";i:2010;s:6:"handle";s:4:"zeus";s:4:"type";s:6:"thumbs";s:4:"name";s:4:"Zeus";s:3:"css";s:1367:".zeus .tp-thumb {
opacity:1
}

.zeus .tp-thumb-over {
  background:##back-color##;
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
  z-index:1;
  -webkit-transition:all 0.3s;
  transition:all 0.3s;
}

.zeus .tp-thumb-more:before {
  font-family: 'revicons';
  font-size:##font-size##px;
  color:##title-color##;
  display:block;
  line-height: ##title-line-height##px;
  text-align: left;    
  z-index:2;
  position:absolute;
  top:20px;
  right:20px;
  z-index:2;
}
.zeus .tp-thumb-more:before {
  content: '##thumb-more##';
}

.zeus .tp-thumb-title {
  font-family:'##font-family##';
  letter-spacing:1px;
  font-size: ##font-size##px;
  color:##title-color##;
  display:block;
  line-height: ##title-line-height##px;
  text-align: left;    
  z-index:2;
  position:absolute;
  top:0px;
  left:0px;
  z-index:2;
  padding:20px 35px 20px 20px;
  width:100%;
  height:100%;
  box-sizing:border-box;
  transition:all 0.3s;
  -webkit-transition:all 0.3s;
  font-weight:500;
}

.zeus .tp-thumb.selected .tp-thumb-more:before,
.zeus .tp-thumb.rs-touchhover .tp-thumb-more:before {
 color:##title-color##;

}

.zeus .tp-thumb.selected .tp-thumb-over,
.zeus .tp-thumb.rs-touchhover .tp-thumb-over {
 background:##back-hover##;
}
.zeus .tp-thumb.selected .tp-thumb-title,
.zeus .tp-thumb.rs-touchhover .tp-thumb-title {
  color:##title-color##;

}
";s:6:"markup";s:154:"<span class="tp-thumb-over"></span>
<span class="tp-thumb-image"></span>
<span class="tp-thumb-title">{{title}}</span>
<span class="tp-thumb-more"></span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"400";s:6:"height";s:3:"130";}s:12:"placeholders";a:7:{s:10:"back-hover";a:3:{s:5:"title";s:18:"Overlay-Hover-RGBA";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.75)";}s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"font-size";a:3:{s:5:"title";s:9:"Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:11:"font-family";a:3:{s:5:"title";s:11:"Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:7:"Raleway";}s:10:"back-color";a:3:{s:5:"title";s:7:"Overlay";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:17:"title-line-height";a:3:{s:5:"title";s:17:"Title-Line-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"14";}s:10:"thumb-more";a:3:{s:5:"title";s:10:"Thumb-Icon";s:4:"type";s:4:"icon";s:4:"data";s:5:"\e825";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:18;a:11:{s:2:"id";i:3000;s:6:"handle";s:10:"hesperiden";s:4:"type";s:7:"bullets";s:4:"name";s:10:"Hesperiden";s:3:"css";s:1390:".hesperiden.tp-bullets {
}
.hesperiden.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
	background:transparent;
	padding:10px;
	margin-left:-10px;margin-top:-10px;
	box-sizing:content-box;
   border-radius:8px;
  
}
.hesperiden .tp-bullet {
	width:##bullet-size##px;
	height:##bullet-size##px;
	position:absolute;
	background: ##bullet-bg-top##; /* old browsers */
    background: -moz-linear-gradient(top,  ##bullet-bg-top## 0%, ##bullet-bg-bottom## 100%); /* ff3.6+ */
    background: -webkit-linear-gradient(top,  ##bullet-bg-top## 0%,##bullet-bg-bottom## 100%); /* chrome10+,safari5.1+ */
    background: -o-linear-gradient(top,  ##bullet-bg-top## 0%,##bullet-bg-bottom## 100%); /* opera 11.10+ */
    background: -ms-linear-gradient(top,  ##bullet-bg-top## 0%,##bullet-bg-bottom## 100%); /* ie10+ */
    background: linear-gradient(to bottom,  ##bullet-bg-top## 0%,##bullet-bg-bottom## 100%); /* w3c */
    filter: progid:dximagetransform.microsoft.gradient( 
    startcolorstr='##bullet-bg-top##', endcolorstr='##bullet-bg-bottom##',gradienttype=0 ); /* ie6-9 */
	border:##border-size##px solid ##border-color##;
	border-radius:50%;
	cursor: pointer;
	box-sizing:content-box;
}
.hesperiden .tp-bullet.rs-touchhover,
.hesperiden .tp-bullet.selected {
	background:##hover-bullet-bg##;
}
.hesperiden .tp-bullet-image {
}
.hesperiden .tp-bullet-title {
}
";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:13:"bullet-bg-top";a:3:{s:5:"title";s:13:"Bullet-BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#999999";}s:16:"bullet-bg-bottom";a:3:{s:5:"title";s:16:"Bullet-BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#e1e1e1";}s:12:"border-color";a:3:{s:5:"title";s:12:"Border-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:11:"border-size";a:3:{s:5:"title";s:11:"Border-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:15:"hover-bullet-bg";a:3:{s:5:"title";s:15:"Hover-Bullet-BG";s:4:"type";s:5:"color";s:4:"data";s:7:"#666666";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:19;a:11:{s:2:"id";i:3001;s:6:"handle";s:5:"gyges";s:4:"type";s:7:"bullets";s:4:"name";s:5:"Gyges";s:3:"css";s:1669:".gyges.tp-bullets {
}
.gyges.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
    background: -moz-linear-gradient(top,  ##bgtop## 0%, ##bgbottom## 100%); 
    background: -webkit-linear-gradient(top,  ##bgtop## 0%,##bgbottom## 100%); 
    background: -o-linear-gradient(top,  ##bgtop## 0%,##bgbottom## 100%); 
    background: -ms-linear-gradient(top,  ##bgtop## 0%,##bgbottom## 100%); 
    background: linear-gradient(to bottom,  ##bgtop## 0%, ##bgbottom## 100%); 
    filter: progid:dximagetransform.microsoft.gradient( startcolorstr='##bgtop##', 
    endcolorstr='##bgbottom##',gradienttype=0 ); 
	padding:10px;
	margin-left:-10px;margin-top:-10px;
	box-sizing:content-box;
  border-radius:10px;
}
.gyges .tp-bullet {
	width:12px;
	height:12px;
	position:absolute;
	background:##bulletbg##;
	border:3px solid ##bordercolor##;
	border-radius:50%;
	cursor: pointer;
	box-sizing:content-box;
}
.gyges .tp-bullet.rs-touchhover,
.gyges .tp-bullet.selected {

    background: -moz-linear-gradient(top,  ##hbgtop## 0%, ##hbgbottom## 100%); /* ff3.6+ */
    background: -webkit-linear-gradient(top,  ##hbgtop## 0%,##hbgbottom## 100%); /* chrome10+,safari5.1+ */
    background: -o-linear-gradient(top,  ##hbgtop## 0%,##hbgbottom## 100%); /* opera 11.10+ */
    background: -ms-linear-gradient(top,  ##hbgtop## 0%,##hbgbottom## 100%); /* ie10+ */
    background: linear-gradient(to bottom,  ##hbgtop## 0%,##hbgbottom## 100%); /* w3c */
    filter: progid:dximagetransform.microsoft.gradient( startcolorstr='##hbgtop##', 
    endcolorstr='##hbgbottom##',gradienttype=0 ); /* ie6-9 */

}
.gyges .tp-bullet-image {
}
.gyges .tp-bullet-title {
}
	";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:5:"bgtop";a:3:{s:5:"title";s:6:"BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#777777";}s:8:"bgbottom";a:3:{s:5:"title";s:9:"BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#666666";}s:11:"bordercolor";a:3:{s:5:"title";s:6:"Border";s:4:"type";s:5:"color";s:4:"data";s:7:"#444444";}s:8:"bulletbg";a:3:{s:5:"title";s:9:"Bullet-BG";s:4:"type";s:5:"color";s:4:"data";s:7:"#333333";}s:6:"hbgtop";a:3:{s:5:"title";s:12:"Hover-BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"hbgbottom";a:3:{s:5:"title";s:15:"Hover-BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#e0e0e0";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:20;a:11:{s:2:"id";i:3002;s:6:"handle";s:5:"hades";s:4:"type";s:7:"bullets";s:4:"name";s:5:"Hades";s:3:"css";s:1535:".hades.tp-bullets {
}
.hades.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
	background:transparent;
	padding:10px;
	margin-left:-10px;margin-top:-10px;
	box-sizing:content-box;
}
.hades .tp-bullet {
	width:##innersize##px;
	height:##innersize##px;
	position:absolute;
	background:##colorinner##;
	cursor: pointer;
    border:##outersize##px solid ##outercolor##;
	box-sizing:content-box;
    box-shadow:0px 0px 3px 1px rgba(0,0,0,0.2);
    -webkit-perspective:400;
    perspective:400;
    -webkit-transform:translatez(0.01px);
    transform:translatez(0.01px);
}
.hades .tp-bullet.rs-touchhover,
.hades .tp-bullet.selected {
	background:##innerhover##;
    border-color:##outerhover##;
}

.hades .tp-bullet-image {
  position:absolute;
  top:##voffset##px; 
  left:##hoffset##;
  width:##width##px;
  height:##height##px;
  background-position:center center;
  background-size:cover;
  visibility:hidden;
  opacity:0;
  transition:all 0.3s;
  -webkit-transform-style:flat;
  transform-style:flat;
  perspective:600;
  -webkit-perspective:600;
  transform: rotatex(-90deg) translatex(-50%);
  -webkit-transform: rotatex(-90deg) translate(-50%);
  box-shadow:0px 0px 3px 1px rgba(0,0,0,0.2);
  transform-origin:50% 100%;
  -webkit-transform-origin:50% 100%;
  
  
}
.hades .tp-bullet.rs-touchhover .tp-bullet-image {
  display:block;
  opacity:1;
  transform: rotatex(0deg) translatex(-50%);
  -webkit-transform: rotatex(0deg) translatex(-50%);
  visibility:visible;
    }
.hades .tp-bullet-title {
}
";s:6:"markup";s:37:"<span class="tp-bullet-image"></span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:10:{s:9:"innersize";a:3:{s:5:"title";s:10:"Size-Inner";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:10:"colorinner";a:3:{s:5:"title";s:11:"Color-Inner";s:4:"type";s:5:"color";s:4:"data";s:7:"#7f7f7f";}s:9:"outersize";a:3:{s:5:"title";s:10:"Size-Outer";s:4:"type";s:6:"custom";s:4:"data";s:1:"5";}s:10:"outercolor";a:3:{s:5:"title";s:11:"Color-Outer";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"outerhover";a:3:{s:5:"title";s:11:"Hover-Outer";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"innerhover";a:3:{s:5:"title";s:11:"Hover-Inner";s:4:"type";s:5:"color";s:4:"data";s:7:"#565656";}s:5:"width";a:3:{s:5:"title";s:11:"Image-Width";s:4:"type";s:6:"custom";s:4:"data";s:3:"120";}s:6:"height";a:3:{s:5:"title";s:12:"Image-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:7:"hoffset";a:3:{s:5:"title";s:17:"Horizontal-Offset";s:4:"type";s:6:"custom";s:4:"data";s:1:"0";}s:7:"voffset";a:3:{s:5:"title";s:15:"Vertical-Offset";s:4:"type";s:6:"custom";s:4:"data";s:3:"-80";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:21;a:11:{s:2:"id";i:3003;s:6:"handle";s:4:"ares";s:4:"type";s:7:"bullets";s:4:"name";s:4:"Ares";s:3:"css";s:4476:".ares.tp-bullets {
}
.ares.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
	background:transparent;
	padding:10px;
	margin-left:-10px;margin-top:-10px;
	box-sizing:content-box;
}
.ares .tp-bullet {
	width:##bullet-size##px;
	height:##bullet-size##px;
	position:absolute;
	background:##bullet-bg-color##;
	border-radius:50%;
	cursor: pointer;
	box-sizing:content-box;
}
.ares .tp-bullet.rs-touchhover,
.ares .tp-bullet.selected {
	background:##hover-bullet-bg-color##;
}
.ares .tp-bullet-title {
  position:absolute;
  color:##title-color##;
  font-size:##title-font-size##px;
  padding:0px 10px;
  font-weight:600;
  right:27px;
  top:-4px;  
  background:##title-bg-color##;
  visibility:hidden;
  transform:translatex(-20px);
  -webkit-transform:translatex(-20px);
  transition:transform 0.3s;
  -webkit-transition:transform 0.3s;
  line-height:20px;
  white-space:nowrap;
}     

.ares .tp-bullet-title:after {
    width: 0px;
	height: 0px;
	border-style: solid;
	border-width: 10px 0 10px 10px;
	border-color: transparent transparent transparent ##title-bg-color##;
	content:' ';
    position:absolute;
    right:-10px;
	top:0px;
}
    
.ares .tp-bullet.rs-touchhover .tp-bullet-title{
  visibility:visible;
   transform:translatex(0px);
  -webkit-transform:translatex(0px);
}

.ares .tp-bullet.selected.rs-touchhover .tp-bullet-title {
    background:##hover-bullet-bg-color##;}
.ares .tp-bullet.selected.rs-touchhover .tp-bullet-title:after {
  border-color:transparent transparent transparent ##hover-bullet-bg-color##;
}
.ares.tp-bullets.rs-touchhover .tp-bullet-title {
  visibility:hidden;
  
}
.ares.tp-bullets.rs-touchhover .tp-bullet.rs-touchhover .tp-bullet-title {
    visibility:visible;
    transform:translateX(0px) translatey(0px);
  -webkit-transform:translateX(0px) translatey(0px);
}


/* VERTICAL */
.ares.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title { right:auto; left:27px;  transform:translatex(20px); -webkit-transform:translatex(20px);}  
.ares.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title:after { 
  border-width: 10px 10px 10px 0 !important;
  border-color: transparent ##title-bg-color## transparent transparent;
  right:auto !important;
  left:-10px !important;   
}
.ares.nav-dir-vertical.nav-pos-hor-left .tp-bullet.selected.rs-touchhover .tp-bullet-title:after {
  border-color:  transparent ##hover-bullet-bg-color## transparent transparent !important;
}



/* HORIZONTAL BOTTOM && CENTER */
.ares.nav-dir-horizontal.nav-pos-ver-center .tp-bullet-title,
.ares.nav-dir-horizontal.nav-pos-ver-bottom .tp-bullet-title { top:-35px; left:50%; right:auto; transform: translateX(-50%) translateY(-10px);-webkit-transform: translateX(-50%) translateY(-10px); }  

.ares.nav-dir-horizontal.nav-pos-ver-center .tp-bullet-title:after,
.ares.nav-dir-horizontal.nav-pos-ver-bottom .tp-bullet-title:after { 
  border-width: 10px 10px 0px 10px;
  border-color: ##title-bg-color## transparent transparent transparent;
  right:auto;
  left:50%;
  margin-left:-10px;
  top:auto;
  bottom:-10px;
    
}
.ares.nav-dir-horizontal.nav-pos-ver-center .tp-bullet.selected.rs-touchhover .tp-bullet-title:after,
.ares.nav-dir-horizontal.nav-pos-ver-bottom .tp-bullet.selected.rs-touchhover .tp-bullet-title:after {
  border-color:  ##hover-bullet-bg-color## transparent transparent transparent;
}

.ares.nav-dir-horizontal.nav-pos-ver-center .tp-bullet.rs-touchhover .tp-bullet-title,
.ares.nav-dir-horizontal.nav-pos-ver-bottom .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateX(-50%) translatey(0px);
  -webkit-transform:translateX(-50%) translatey(0px);
}


/* HORIZONTAL TOP */
.ares.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title { top:25px; left:50%; right:auto; transform: translateX(-50%) translateY(10px);-webkit-transform: translateX(-50%) translateY(10px); }  
.ares.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title:after { 
  border-width: 0 10px 10px 10px;
  border-color:  transparent transparent ##title-bg-color## transparent;
  right:auto;
  left:50%;
  margin-left:-10px;
  bottom:auto;
  top:-10px;
    
}
.ares.nav-dir-horizontal.nav-pos-ver-top .tp-bullet.selected.rs-touchhover .tp-bullet-title:after {
  border-color:  transparent transparent  ##hover-bullet-bg-color## transparent;
}

.ares.nav-dir-horizontal.nav-pos-ver-top .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateX(-50%) translatey(0px);
  -webkit-transform:translateX(-50%) translatey(0px);
}

";s:6:"markup";s:46:"<span class="tp-bullet-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:6:{s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:15:"bullet-bg-color";a:3:{s:5:"title";s:17:"Bullet-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:21:"hover-bullet-bg-color";a:3:{s:5:"title";s:15:"Hover-Bullet-BG";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#888888";}s:15:"title-font-size";a:3:{s:5:"title";s:15:"Title-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:14:"title-bg-color";a:3:{s:5:"title";s:14:"Title-BG-Color";s:4:"type";s:5:"color";s:4:"data";s:22:"rgba(255,255,255,0.75)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:22;a:11:{s:2:"id";i:3004;s:6:"handle";s:4:"hebe";s:4:"type";s:7:"bullets";s:4:"name";s:4:"Hebe";s:3:"css";s:3217:"
.hebe.tp-bullets:before {
  content:' ';
  position:absolute;
  width:100%;
  height:100%;
  background:transparent;
  padding:10px;
  margin-left:-10px;margin-top:-10px;
  box-sizing:content-box;
}

.hebe .tp-bullet {
  width:##bullet-back-size##px;
  height:##bullet-back-size##px;
  position:absolute;
  background:##bullet-back-color##;  
  cursor: pointer;
  border:##bullet-border-size##px solid ##bullet-border-color##;
  border-radius:##bradius##;
  box-sizing:content-box;
  -webkit-perspective:400;
  perspective:400;
  -webkit-transform:translatez(0.01px);
  transform:translatez(0.01px);
   transition:all ##aspeed##s;
}
.hebe .tp-bullet.rs-touchhover,
.hebe .tp-bullet.selected {
  background:##bullet-border-color##;
  border-color:##bullet-back-color##;
}

.hebe .tp-bullet-image {
  position:absolute;
  width:##width##px;
  height:##height##px;
  background-position:center center;
  background-size:cover;
  visibility:hidden;
  opacity:0;
  bottom:##bullet-back-size##px;
  transition:all ##aspeed##s;
  -webkit-transform-style:flat;
  transform-style:flat;
  perspective:600;
  -webkit-perspective:600;
  transform: scale(0) translateX(-50%) translateY(0%);
  -webkit-transform: scale(0) translateX(-50%) translateY(0%);
  transform-origin:0% 100%;
  -webkit-transform-origin:0% 100%;
  margin-bottom:15px;
 border-radius:##iradius##px;
}
.hebe .tp-bullet.rs-touchhover .tp-bullet-image {
  display:block;
  opacity:1;
  transform: scale(1) translateX(-50%) translateY(0%);
  -webkit-transform: scale(1) translateX(-50%) translateY(0%);
  visibility:visible;
}


/* VERTICAL */

.hebe.nav-dir-vertical .tp-bullet-image {
  bottom:auto;
  margin-right:15px;
  margin-bottom:0px;
  right:##bullet-back-size##px;
  transform: scale(0) translateX(0px) translateY(-50%);
  -webkit-transform: scale(0) translateX(0px) translateY(-50%);
  transform-origin:100% 0%;
  -webkit-transform-origin:100% 0%;
}

.hebe.nav-dir-vertical .tp-bullet.rs-touchhover .tp-bullet-image {
  transform: scale(1) translateX(0px) translateY(-50%);
  -webkit-transform: scale(1) translateX(0px) translateY(-50%);
}

/* VERTICAL LEFT */

.hebe.nav-dir-vertical.nav-pos-hor-left .tp-bullet-image {
  bottom:auto;
  margin-left:15px;
  margin-bottom:0px;
  left:##bullet-back-size##px;
  transform: scale(0) translateX(0px) translateY(-50%);
  -webkit-transform: scale(0) translateX(0px) translateY(-50%);
  transform-origin:0% 0%;
  -webkit-transform-origin:0% 0%;
}

.hebe.nav-dir-vertical.nav-pos-hor-left .tp-bullet.rs-touchhover .tp-bullet-image {
  transform: scale(1) translateX(0px) translateY(-50%);
  -webkit-transform: scale(1) translateX(0px) translateY(-50%);
}

/* HORIZONTAL TOP */
.hebe.nav-pos-ver-top.nav-dir-horizontal .tp-bullet-image {
  bottom:auto;
  top:##bullet-back-size##px;
  transform: scale(0) translateX(-50%) translateY(0%);
  -webkit-transform: scale(0) translateX(-50%) translateY(0%);
  transform-origin:0% 0%;
  -webkit-transform-origin:0% 0%;
  margin-top:15px;
  margin-bottom:0px;  
}
.hebe.nav-pos-ver-top.nav-dir-horizontal .tp-bullet.rs-touchhover .tp-bullet-image {
  transform: scale(1) translateX(-50%) translateY(0%);
  -webkit-transform: scale(1) translateX(-50%) translateY(0%);
}";s:6:"markup";s:37:"<span class="tp-bullet-image"></span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:9:{s:17:"bullet-back-color";a:3:{s:5:"title";s:17:"Bullet-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:19:"bullet-border-color";a:3:{s:5:"title";s:19:"Bullet-Border-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:18:"bullet-border-size";a:3:{s:5:"title";s:18:"Bullet-Border-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"5";}s:16:"bullet-back-size";a:3:{s:5:"title";s:14:"Bullet-BG-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:5:"width";a:3:{s:5:"title";s:11:"Image-Width";s:4:"type";s:6:"custom";s:4:"data";s:2:"70";}s:6:"height";a:3:{s:5:"title";s:12:"Image-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"70";}s:7:"iradius";a:3:{s:5:"title";s:12:"Image-Radius";s:4:"type";s:6:"custom";s:4:"data";s:1:"6";}s:7:"bradius";a:3:{s:5:"title";s:13:"Bullet-Radius";s:4:"type";s:6:"custom";s:4:"data";s:3:"50%";}s:6:"aspeed";a:3:{s:5:"title";s:15:"Animation-Speed";s:4:"type";s:6:"custom";s:4:"data";s:3:"0.3";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:23;a:11:{s:2:"id";i:3005;s:6:"handle";s:6:"hermes";s:4:"type";s:7:"bullets";s:4:"name";s:6:"Hermes";s:3:"css";s:755:".hermes.tp-bullets {
}

.hermes .tp-bullet {
    overflow:hidden;
    border-radius:50%;
    width:##bullet-size##px;
    height:##bullet-size##px;
    background-color: rgba(0, 0, 0, 0);
    box-shadow: inset 0 0 0 ##border##px ##bullet-color##;
    -webkit-transition: background 0.3s ease;
    transition: background 0.3s ease;
    position:absolute;
}

.hermes .tp-bullet.rs-touchhover {
	  background-color: ##bullet-hover##;
}
.hermes .tp-bullet:after {
  content: ' ';
  position: absolute;
  bottom: 0;
  height: 0;
  left: 0;
  width: 100%;
  background-color: ##bullet-color##;
  box-shadow: 0 0 1px ##bullet-color##;
  -webkit-transition: height 0.3s ease;
  transition: height 0.3s ease;
}
.hermes .tp-bullet.selected:after {
  height:100%;
}
";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:4:{s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"16";}s:12:"bullet-color";a:3:{s:5:"title";s:12:"Bullet-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:6:"border";a:3:{s:5:"title";s:16:"Border-Thickness";s:4:"type";s:6:"custom";s:4:"data";s:1:"2";}s:12:"bullet-hover";a:3:{s:5:"title";s:12:"Hover-Bullet";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.21)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:24;a:11:{s:2:"id";i:3006;s:6:"handle";s:6:"custom";s:4:"type";s:7:"bullets";s:4:"name";s:6:"Custom";s:3:"css";s:539:".custom.tp-bullets {
}
.custom.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
	background:transparent;
	padding:10px;
	margin-left:-10px;margin-top:-10px;
	box-sizing:content-box;
}
.custom .tp-bullet {
	width:12px;
	height:12px;
	position:absolute;
	background:#aaa;
    background:rgba(125,125,125,0.5);
	cursor: pointer;
	box-sizing:content-box;
}
.custom .tp-bullet.rs-touchhover,
.custom .tp-bullet.selected {
	background:rgb(125,125,125);
}
.custom .tp-bullet-image {
}
.custom .tp-bullet-title {
}
";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:0:{}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:25;a:11:{s:2:"id";i:3007;s:6:"handle";s:10:"hephaistos";s:4:"type";s:7:"bullets";s:4:"name";s:10:"Hephaistos";s:3:"css";s:445:".hephaistos .tp-bullet {
	width:##bullet-size##px;
	height:##bullet-size##px;
	position:absolute;
	background:##back-color##;
	border:##border-size##px solid ##border-color##;
	border-radius:50%;
	cursor: pointer;
	box-sizing:content-box;
    box-shadow: 0px 0px 2px 1px rgba(130,130,130, 0.3);
}
.hephaistos .tp-bullet.rs-touchhover,
.hephaistos .tp-bullet.selected {
	background:##back-hover-color##;
    border-color:##border-hover-color##;
}";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"161";s:6:"height";s:3:"159";}s:12:"placeholders";a:6:{s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#999999";}s:12:"border-color";a:3:{s:5:"title";s:12:"Border-Color";s:4:"type";s:5:"color";s:4:"data";s:21:"rgba(255,255,255,0.9)";}s:11:"border-size";a:3:{s:5:"title";s:11:"Border-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:16:"back-hover-color";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:18:"border-hover-color";a:3:{s:5:"title";s:12:"Hover-Border";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:26;a:11:{s:2:"id";i:3008;s:6:"handle";s:10:"persephone";s:4:"type";s:7:"bullets";s:4:"name";s:10:"Persephone";s:3:"css";s:311:".persephone .tp-bullet {
	width:##bullet-size##px;
	height:##bullet-size##px;
	position:absolute;
	background:##back-color##;
	border:1px solid ##border-color##;	
	cursor: pointer;
	box-sizing:content-box;
}
.persephone .tp-bullet.rs-touchhover,
.persephone .tp-bullet.selected {
	background:##back-hover##;
}

";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:4:{s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#aaaaaa";}s:12:"border-color";a:3:{s:5:"title";s:12:"Border-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:10:"back-hover";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:27;a:11:{s:2:"id";i:3009;s:6:"handle";s:7:"erinyen";s:4:"type";s:7:"bullets";s:4:"name";s:7:"Erinyen";s:3:"css";s:1591:".erinyen.tp-bullets {
}
.erinyen.tp-bullets:before {
	content:' ';
	position:absolute;
	width:100%;
	height:100%;
    background: -moz-linear-gradient(top,  ##back-top## 0%, ##back-bottom## 100%); /* ff3.6+ */
    background: -webkit-linear-gradient(top,  ##back-top## 0%,##back-bottom## 100%); /* chrome10+,safari5.1+ */
    background: -o-linear-gradient(top,  ##back-top## 0%,##back-bottom## 100%); /* opera 11.10+ */
    background: -ms-linear-gradient(top,  ##back-top## 0%,##back-bottom## 100%); /* ie10+ */
    background: linear-gradient(to bottom,  ##back-top## 0%,##back-bottom## 100%); /* w3c */

	padding:10px 15px;
	margin-left:-15px;margin-top:-10px;
	box-sizing:content-box;
   border-radius:10px;
   box-shadow:0px 0px 2px 1px rgba(33,33,33,0.3);
}
.erinyen .tp-bullet {
	width:##bullet-size##px;
	height:##bullet-size##px;
	position:absolute;
	background:##bullet-back##;	
	border-radius:50%;
	cursor: pointer;
	box-sizing:content-box;
}
.erinyen .tp-bullet.rs-touchhover,
.erinyen .tp-bullet.selected {
background: -moz-linear-gradient(top,  ##bullet-top## 0%, ##bullet-bottom## 100%); /* ff3.6+ */
background: -webkit-linear-gradient(top,  ##bullet-top## 0%,##bullet-bottom## 100%); /* chrome10+,safari5.1+ */
background: -o-linear-gradient(top,  ##bullet-top## 0%,##bullet-bottom## 100%); /* opera 11.10+ */
background: -ms-linear-gradient(top,  ##bullet-top## 0%,##bullet-bottom## 100%); /* ie10+ */
background: linear-gradient(to bottom,  ##bullet-top## 0%,##bullet-bottom## 100%); /* w3c */
border:1px solid #555;
width:##bullet-size##px;
height:##bullet-size##px;
}

";s:6:"markup";s:0:"";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:6:{s:8:"back-top";a:3:{s:5:"title";s:6:"BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#545353";}s:11:"back-bottom";a:3:{s:5:"title";s:9:"BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#222222";}s:10:"bullet-top";a:3:{s:5:"title";s:13:"Bullet-BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:13:"bullet-bottom";a:3:{s:5:"title";s:16:"Bullet-BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#999999";}s:11:"bullet-back";a:3:{s:5:"title";s:9:"Bullet-BG";s:4:"type";s:5:"color";s:4:"data";s:7:"#111111";}s:11:"bullet-size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:28;a:11:{s:2:"id";i:3010;s:6:"handle";s:4:"zeus";s:4:"type";s:7:"bullets";s:4:"name";s:4:"Zeus";s:3:"css";s:5943:".zeus .tp-bullet {
     box-sizing:content-box; -webkit-box-sizing:content-box; border-radius:50%;
      background-color: rgba(0, 0, 0, 0);
      -webkit-transition: opacity 0.3s ease;
      transition: opacity 0.3s ease;
    width:##size##px;height:##size##px;
    border:2px solid ##color##;
 }
.zeus .tp-bullet:after {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  border-radius: 50%;
  background-color: ##color##;
  -webkit-transform: scale(0);
  transform: scale(0);
  -webkit-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
  -webkit-transition: -webkit-transform 0.3s ease;
  transition: transform 0.3s ease;
}
.zeus .tp-bullet.rs-touchhover:after,
.zeus .tp-bullet.selected:after{
    -webkit-transform: scale(1.2);
  transform: scale(1.2);
}
  
 .zeus .tp-bullet-image,
 .zeus .tp-bullet-imageoverlay{
        width:##img-width##px;
        height:##img-height##px;
        position:absolute;
        background:#000;
        background:rgba(0,0,0,0.5);
        bottom:##size##px;
        margin-bottom:10px;
        transform:translateX(-50%);
       -webkit-transform:translateX(-50%);
        box-sizing:border-box;
        background-size:cover;
        background-position:center center;
        visibility:hidden;
        opacity:0;
         -webkit-backface-visibility: hidden; 
        backface-visibility: hidden;
        -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
      -webkit-transition: all 0.3s ease;
      transition: all 0.3s ease;
        border-radius:4px;
}
          

.zeus .tp-bullet-title,
.zeus .tp-bullet-imageoverlay {
        z-index:2;
        -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
        transform:translateX(-50%);
       -webkit-transform:translateX(-50%);
}     
.zeus .tp-bullet-title { 
        color:##title-color##;
        text-align:center;
        line-height:##title-line-height##px;
        font-size:##title-font-size##px;
        font-weight:600;  
        z-index:3;
         visibility:hidden;
        opacity:0;
         -webkit-backface-visibility: hidden; 
        backface-visibility: hidden;
        -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
      -webkit-transition: all 0.3s ease;
      transition: all 0.3s ease;
        position:absolute;
        bottom:##tooltip-bottom##px;
        width:##img-width##px;
      vertical-align:middle;
       
}
      
.zeus .tp-bullet.rs-touchhover .tp-bullet-title,
.zeus .tp-bullet.rs-touchhover .tp-bullet-image,
.zeus .tp-bullet.rs-touchhover .tp-bullet-imageoverlay{
      opacity:1;
      visibility:visible;
    -webkit-transform:translateY(0px) translateX(-50%);
      transform:translateY(0px) translateX(-50%);         
    }




/* VERTICAL RIGHT */

.zeus.nav-dir-vertical .tp-bullet-image,
.zeus.nav-dir-vertical .tp-bullet-imageoverlay{
  bottom:auto;
  margin-right:10px;
  margin-bottom:0px;
  right:##size##px;
  transform: translateX(0px) translateY(-50%);
  -webkit-transform:  translateX(0px) translateY(-50%);
  
}

.zeus.nav-dir-vertical .tp-bullet.rs-touchhover .tp-bullet-image {
  transform: translateX(0px) translateY(-50%);
  -webkit-transform: translateX(0px) translateY(-50%);
}


.zeus.nav-dir-vertical .tp-bullet-title,
.zeus.nav-dir-vertical .tp-bullet-imageoverlay {
        z-index:2;
        -webkit-transition: all 0.5s ease;
       transition: all 0.5s ease;
        transform: translateX(0px) translateY(-50%);
       -webkit-transform: translateX(0px) translateY(-50%);
}   


.zeus.nav-dir-vertical .tp-bullet-title {
     bottom:auto;
     right:100%;
     margin-right:10px;
}

.zeus.nav-dir-vertical .tp-bullet.rs-touchhover .tp-bullet-title,
.zeus.nav-dir-vertical .tp-bullet.rs-touchhover .tp-bullet-image,
.zeus.nav-dir-vertical .tp-bullet.rs-touchhover .tp-bullet-imageoverlay {
 transform: translateX(0px) translateY(-50%);
  -webkit-transform: translateX(0px) translateY(-50%);
}



/* VERTICAL LEFT */

.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet-image,
.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet-imageoverlay{
  bottom:auto;
  margin-left:10px;
  margin-bottom:0px;
  left:##size##px;
  transform:  translateX(0px) translateY(-50%);
  -webkit-transform:  translateX(0px) translateY(-50%);
  
}

.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet.rs-touchhover .tp-bullet-image {
  transform: translateX(0px) translateY(-50%);
  -webkit-transform: translateX(0px) translateY(-50%);
}

.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title,
.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet-imageoverlay {
        z-index:2;
        -webkit-transition: all 0.5s ease;
       transition: all 0.5s ease;
        transform:translateX(0px) translateY(-50%);
       -webkit-transform:translateX(0px) translateY(-50%);
}   


.zeus.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title {
     bottom:auto;
     left:100%;
     margin-left:10px;
}

/* HORIZONTAL TOP */

.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-image,
.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-imageoverlay{
  bottom:auto;
  top:##size##px;
  margin-top:10px;
  margin-bottom:0px;
  left:0px;
  transform:translateY(0px) translateX(-50%);
  -webkit-transform:translateX(0px) translateX(-50%);
  
}

.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet.rs-touchhover .tp-bullet-image {
  
  transform: scale(1) translateY(0px) translateX(-50%);
  -webkit-transform: scale(1) translateY(0px) translateX(-50%);
  
}

.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title,
.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-imageoverlay {
        z-index:2;
        -webkit-transition: all 0.5s ease;
       transition: all 0.5s ease;
        transform:translateY(0px) translateX(-50%);
       -webkit-transform:translateY(0px) translateX(-50%);
}   


.zeus.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title {
     bottom:auto;
     top:##size##px;
     margin-top:20px;
}
";s:6:"markup";s:129:"<span class="tp-bullet-image"></span>
<span class="tp-bullet-imageoverlay"></span>
<span class="tp-bullet-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:8:{s:5:"color";a:3:{s:5:"title";s:12:"Bullet-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:4:"size";a:3:{s:5:"title";s:11:"Bullet-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:9:"img-width";a:3:{s:5:"title";s:11:"Image-Width";s:4:"type";s:6:"custom";s:4:"data";s:3:"135";}s:10:"img-height";a:3:{s:5:"title";s:12:"Image-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:11:"title-color";a:3:{s:5:"title";s:19:"Tooltip-Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:14:"tooltip-bottom";a:3:{s:5:"title";s:14:"Tooltip-Bottom";s:4:"type";s:6:"custom";s:4:"data";s:2:"45";}s:15:"title-font-size";a:3:{s:5:"title";s:15:"Title-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:17:"title-line-height";a:3:{s:5:"title";s:17:"Title-Line-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:29;a:11:{s:2:"id";i:3011;s:6:"handle";s:5:"metis";s:4:"type";s:7:"bullets";s:4:"name";s:5:"Metis";s:3:"css";s:4701:".metis .tp-bullet { 
    opacity:1;
    width:##size##px;
    height:##size##px;    
    padding:##border-width##px;
    background-color:##idlecolor##;
    margin:0px;
    box-sizing:border-box;
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
    border-radius:50%;
  }

.metis .tp-bullet-image {

   border-radius:50%;
   display:block;
   box-sizing:border-box;
   position:relative;
    -webkit-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  -moz-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  width:100%;
  height:100%;
  background-size:cover;
  background-position:center center;
 }  
.metis .tp-bullet-title { 
     position:absolute; 
     bottom:##size##px;
     margin-bottom:10px;
     display:inline-block;
     left:50%;
     background:#000;
     background:##idlecolor-title##;
     color:##tooltip-color##;
     padding:10px 30px;
     border-radius:4px;
   -webkit-border-radius:4px;
     opacity:0;
      transition:all 0.3s;
    -webkit-transition:all 0.3s;
    transform: translatez(0.001px) translatex(-50%) translatey(14px);
    transform-origin:50% 100%;
    -webkit-transform: translatez(0.001px) translatex(-50%) translatey(14px);
    -webkit-transform-origin:50% 100%;
    opacity:0;
    white-space:nowrap;
 }

.metis .tp-bullet.rs-touchhover .tp-bullet-title {
     transform:rotatex(0deg) translatex(-50%);
    -webkit-transform:rotatex(0deg) translatex(-50%);
    opacity:1;
}

.metis .tp-bullet.selected,
.metis .tp-bullet.rs-touchhover  {
background: -moz-linear-gradient(top,  ##hovercolor## 0%, ##hbgb## 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, ##hovercolor##, color-stop(100%, ##hbgb##)));
background: -webkit-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -o-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -ms-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: linear-gradient(to bottom, ##hovercolor## 0%, ##hbgb## 100%);
  }
.metis .tp-bullet-title:after {
    content:' ';
    position:absolute;
    left:50%;
    margin-left:-8px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 8px 8px 0 8px;
    border-color: ##idlecolor-title## transparent transparent transparent;
    bottom:-8px;
   }



/* VERTICAL RIGHT */
.metis.nav-dir-vertical.nav-pos-hor-right .tp-bullet-title { 
   margin-bottom:0px; top:50%; right:##size##px; left:auto; bottom:auto; margin-right:10px;  transform: translateX(-10px) translateY(-50%);-webkit-transform: translateX(-10px) translateY(-50%); 
}  
.metis.nav-dir-vertical.nav-pos-hor-right .tp-bullet-title:after { 
  border-width: 10px 0 10px 10px;
  border-color:  transparent transparent transparent ##idlecolor-title## ;
  right:-10px;
  left:auto;  
  bottom:auto;
  top:10px;    
}


.metis.nav-dir-vertical.nav-pos-hor-right .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateY(-50%) translateX(0px);
  -webkit-transform:translateY(-50%) translateX(0px);
}

/* VERTICAL LEFT && CENTER*/
.metis.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title,
.metis.nav-dir-vertical.nav-pos-hor-center .tp-bullet-title { 
   margin-bottom:0px; top:50%; left:##size##px; right:auto; bottom:auto; margin-left:10px;  transform: translateX(10px) translateY(-50%);-webkit-transform: translateX(10px) translateY(-50%); 
}  
.metis.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title:after,
.metis.nav-dir-vertical.nav-pos-hor-center .tp-bullet-title:after { 
  border-width: 10px 10px 10px 0;
  border-color:  transparent ##idlecolor-title##  transparent transparent ;
  left:-2px;
  right:auto;  
  bottom:auto;
  top:10px;    
}


.metis.nav-dir-vertical.nav-pos-hor-left .tp-bullet.rs-touchhover .tp-bullet-title,
.metis.nav-dir-vertical.nav-pos-hor-center .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateY(-50%) translateX(0px);
  -webkit-transform:translateY(-50%) translateX(0px);
}


/* HORIZONTAL TOP */
.metis.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title { 
   margin-bottom:0px; top:##size##px; left:50%; bottom:auto; margin-top:10px; right:auto; transform: translateX(-50%) translateY(10px);-webkit-transform: translateX(-50%) translateY(10px); 
}  
.metis.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title:after { 
  border-width: 0 10px 10px 10px;
  border-color:  transparent transparent ##idlecolor-title## transparent;
  right:auto;
  left:50%;
  margin-left:-10px;
  bottom:auto;
  top:-10px;
    
}


.metis.nav-dir-horizontal.nav-pos-ver-top .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateX(-50%) translatey(0px);
  -webkit-transform:translateX(-50%) translatey(0px);
}

";s:6:"markup";s:128:"<span class="tp-bullet-img-wrap">
  <span class="tp-bullet-image"></span>
</span>
<span class="tp-bullet-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:7:{s:4:"size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"50";}s:12:"border-width";a:3:{s:5:"title";s:12:"Border-Width";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:13:"tooltip-color";a:3:{s:5:"title";s:13:"Tooltip-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"idlecolor";a:3:{s:5:"title";s:10:"Idle-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:15:"idlecolor-title";a:3:{s:5:"title";s:16:"Idle-Color-Title";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.75)";}s:10:"hovercolor";a:3:{s:5:"title";s:12:"Hover-BG-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:4:"hbgb";a:3:{s:5:"title";s:15:"Hover-BG-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#777777";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:30;a:11:{s:2:"id";i:3012;s:6:"handle";s:5:"dione";s:4:"type";s:7:"bullets";s:4:"name";s:5:"Dione";s:3:"css";s:4628:"
.dione .tp-bullet { 
    opacity:1;
    width:##size##px;
    height:##size##px;    
    padding:##border-size##px;
    background-color:##idlecolor##;
    margin:0px;
    box-sizing:border-box;
    transition:all 0.3s;
    -webkit-transition:all 0.3s;
  }

.dione .tp-bullet-image {
   display:block;
   box-sizing:border-box;
   position:relative;
    -webkit-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  -moz-box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  box-shadow: inset 5px 5px 10px 0px rgba(0,0,0,0.25);
  width:100%;
  height:100%;
  background-size:cover;
  background-position:center center;
 }  
.dione .tp-bullet-title { 
     position:absolute; 
     font-size:13px; 
     line-height:18px; 
    bottom:##tooltip-offset##px;
     display:inline-block;
     left:50%;
     background:##idlecolor-title##;
     color:##tooltip-color##;
     padding:10px 30px;
     border-radius:4px;
   -webkit-border-radius:4px;
     opacity:0;
      transition:all 0.3s;
    -webkit-transition:all 0.3s;
    transform: translatez(0.001px) translatex(-50%) translatey(14px);
    transform-origin:50% 100%;
    -webkit-transform: translatez(0.001px) translatex(-50%) translatey(14px);
    -webkit-transform-origin:50% 100%;
    opacity:0;
    white-space:nowrap;
 }

.dione .tp-bullet.rs-touchhover .tp-bullet-title {
     transform:rotatex(0deg) translatex(-50%);
    -webkit-transform:rotatex(0deg) translatex(-50%);
    opacity:1;
}

.dione .tp-bullet.selected,
.dione .tp-bullet.rs-touchhover  {
  background: -moz-linear-gradient(top,  ##hovercolor## 0%, ##hbgb## 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, ##hovercolor##, color-stop(100%, ##hbgb##)));
background: -webkit-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -o-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: -ms-linear-gradient(top, ##hovercolor## 0%, ##hbgb## 100%);
background: linear-gradient(to bottom, ##hovercolor## 0%, ##hbgb## 100%);
}
.dione .tp-bullet-title:after {
        content:' ';
        position:absolute;
        left:50%;
        margin-left:-8px;
        width: 0;
    height: 0;
    border-style: solid;
    border-width: 8px 8px 0 8px;
    border-color: ##idlecolor-title## transparent transparent transparent;
    bottom:-8px;
   }


/* VERTICAL RIGHT */
.dione.nav-dir-vertical.nav-pos-hor-right .tp-bullet-title { 
    top:50%; right:##size##px; left:auto; bottom:auto; margin-right:10px;  transform: translateX(-10px) translateY(-50%);-webkit-transform: translateX(-10px) translateY(-50%); 
}  
.dione.nav-dir-vertical.nav-pos-hor-right .tp-bullet-title:after { 
  border-width: 10px 0 10px 10px;
  border-color:  transparent transparent transparent ##idlecolor-title## ;
  right:-10px;
  left:auto;  
  bottom:auto;
  top:10px;    
}


.dione.nav-dir-vertical.nav-pos-hor-right .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateY(-50%) translateX(0px);
  -webkit-transform:translateY(-50%) translateX(0px);
}

/* VERTICAL LEFT && CENTER*/
.dione.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title,
.dione.nav-dir-vertical.nav-pos-hor-center .tp-bullet-title { 
    top:50%; left:##size##px; right:auto; bottom:auto; margin-left:10px;  transform: translateX(10px) translateY(-50%);-webkit-transform: translateX(10px) translateY(-50%); 
}  
.dione.nav-dir-vertical.nav-pos-hor-left .tp-bullet-title:after,
.dione.nav-dir-vertical.nav-pos-hor-center .tp-bullet-title:after { 
  border-width: 10px 10px 10px 0;
  border-color:  transparent ##idlecolor-title##  transparent transparent ;
  left:-2px;
  right:auto;  
  bottom:auto;
  top:10px;    
}


.dione.nav-dir-vertical.nav-pos-hor-left .tp-bullet.rs-touchhover .tp-bullet-title,
.dione.nav-dir-vertical.nav-pos-hor-center .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateY(-50%) translateX(0px);
  -webkit-transform:translateY(-50%) translateX(0px);
}


/* HORIZONTAL TOP */
.dione.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title { 
    top:##size##px; left:50%; bottom:auto; margin-top:10px; right:auto; transform: translateX(-50%) translateY(10px);-webkit-transform: translateX(-50%) translateY(10px); 
}  
.dione.nav-dir-horizontal.nav-pos-ver-top .tp-bullet-title:after { 
  border-width: 0 10px 10px 10px;
  border-color:  transparent transparent ##idlecolor-title## transparent;
  right:auto;
  left:50%;
  margin-left:-10px;
  bottom:auto;
  top:-10px;
    
}


.dione.nav-dir-horizontal.nav-pos-ver-top .tp-bullet.rs-touchhover .tp-bullet-title{
   transform:translateX(-50%) translatey(0px);
  -webkit-transform:translateX(-50%) translatey(0px);
}

";s:6:"markup";s:128:"<span class="tp-bullet-img-wrap">
  <span class="tp-bullet-image"></span>
</span>
<span class="tp-bullet-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:8:{s:4:"size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"50";}s:11:"border-size";a:3:{s:5:"title";s:11:"Border-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"3";}s:9:"idlecolor";a:3:{s:5:"title";s:10:"Idle-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:15:"idlecolor-title";a:3:{s:5:"title";s:10:"Idle-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.65)";}s:14:"tooltip-offset";a:3:{s:5:"title";s:14:"Tooltip-Offset";s:4:"type";s:6:"custom";s:4:"data";s:2:"65";}s:13:"tooltip-color";a:3:{s:5:"title";s:13:"Tooltip-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"hovercolor";a:3:{s:5:"title";s:15:"Hover-Color-Top";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:4:"hbgb";a:3:{s:5:"title";s:18:"Hover-Color-Bottom";s:4:"type";s:5:"color";s:4:"data";s:7:"#777777";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:31;a:11:{s:2:"id";i:3013;s:6:"handle";s:6:"uranus";s:4:"type";s:7:"bullets";s:4:"name";s:6:"Uranus";s:3:"css";s:981:".uranus .tp-bullet{
  border-radius: 50%;
  box-shadow: 0 0 0 2px ##color##;
  -webkit-transition: box-shadow 0.3s ease;
  transition: box-shadow 0.3s ease;
  background:transparent;
  width:##size##px;
  height:##size##px;
}
.uranus .tp-bullet.selected,
.uranus .tp-bullet.rs-touchhover {
  box-shadow: 0 0 0 2px ##color-hover##;
  border:none;
  border-radius: 50%;
  background:transparent;
}

.uranus .tp-bullet-inner {
  -webkit-transition: background-color 0.3s ease, -webkit-transform 0.3s ease;
  transition: background-color 0.3s ease, transform 0.3s ease;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  outline: none;
  border-radius: 50%;
  background-color: ##color##;
  background-color: ##color-inner##;
  text-indent: -999em;
  cursor: pointer;
  position: absolute;
}

.uranus .tp-bullet.selected .tp-bullet-inner,
.uranus .tp-bullet.rs-touchhover .tp-bullet-inner{
 transform: scale(0.4);
 -webkit-transform: scale(0.4);
 background-color:##color-hover##;
}";s:6:"markup";s:37:"<span class="tp-bullet-inner"></span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:4:{s:4:"size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}s:5:"color";a:3:{s:5:"title";s:5:"Color";s:4:"type";s:5:"color";s:4:"data";s:19:"rgba(255,255,255,0)";}s:11:"color-hover";a:3:{s:5:"title";s:11:"Color Hover";s:4:"type";s:5:"color";s:4:"data";s:19:"rgba(255,255,255,1)";}s:11:"color-inner";a:3:{s:5:"title";s:11:"Color Inner";s:4:"type";s:5:"color";s:4:"data";s:21:"rgba(255,255,255,0.3)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:32;a:11:{s:2:"id";i:4000;s:6:"handle";s:10:"hesperiden";s:4:"type";s:4:"tabs";s:4:"name";s:10:"Hesperiden";s:3:"css";s:1265:".hesperiden .tp-tab { 
  opacity:1;      
  padding:10px;
  box-sizing:border-box;
  font-family: '##font-family##', sans-serif;
  border-bottom: ##border-size##px solid ##border-color##;
 }
.hesperiden .tp-tab-image 
{ 
  width:##image-size##px;
  height:##image-size##px; max-height:100%; max-width:100%;
  position:relative;
  display:inline-block;
  float:left;

}
.hesperiden .tp-tab-content 
{
    background:##bgcolor##; 
    position:relative;
    padding:15px 15px 15px 85px;
 left:0px;
 overflow:hidden;
 margin-top:-15px;
    box-sizing:border-box;
    color:##contentcolor##;
    display: inline-block;
    width:100%;
    height:100%;
 position:absolute; }
.hesperiden .tp-tab-date
  {
  display:block;
  color: ##param1-color##;
  font-weight:500;
  font-size:##param1-size##px;
  margin-bottom:0px;
  }
.hesperiden .tp-tab-title 
{
    display:block;	
    text-align:left	;
    color:##param2-color##;
    font-size:##param2-size##px;
    font-weight:500;
    text-transform:none;
    line-height:17px;
}
.hesperiden .tp-tab.rs-touchhover,
.hesperiden .tp-tab.selected {
	background:##hover-bg-color##; 
}

.hesperiden .tp-tab-mask {
}

/* media queries */
@media only screen and (max-width: 960px) {

}
@media only screen and (max-width: 768px) {

}";s:6:"markup";s:160:"<div class="tp-tab-content">
  <span class="tp-tab-date">{{param1}}</span>
  <span class="tp-tab-title">{{title}}</span>
</div>
<div class="tp-tab-image"></div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"250";s:6:"height";s:2:"80";}s:12:"placeholders";a:11:{s:11:"font-family";a:3:{s:5:"title";s:11:"Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:6:"Roboto";}s:12:"border-color";a:3:{s:5:"title";s:19:"Border-Bottom-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:11:"border-size";a:3:{s:5:"title";s:18:"Border-Bottom-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"1";}s:10:"image-size";a:3:{s:5:"title";s:10:"Image-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:12:"param1-color";a:3:{s:5:"title";s:10:"Date-Color";s:4:"type";s:5:"color";s:4:"data";s:18:"rgba(51,51,51,0.5)";}s:11:"param1-size";a:3:{s:5:"title";s:9:"Date-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:14:"hover-bg-color";a:3:{s:5:"title";s:14:"Hover-BG-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#eeeeee";}s:7:"bgcolor";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:13:"rgba(0,0,0,0)";}s:12:"contentcolor";a:3:{s:5:"title";s:7:"Content";s:4:"type";s:5:"color";s:4:"data";s:7:"#333333";}s:12:"param2-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:13:"rgba(0,0,0,1)";}s:11:"param2-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"14";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:33;a:11:{s:2:"id";i:4001;s:6:"handle";s:5:"gyges";s:4:"type";s:4:"tabs";s:4:"name";s:5:"Gyges";s:3:"css";s:1168:".gyges .tp-tab { 
  opacity:1;      
  padding:10px;
  box-sizing:border-box;
  font-family: 'roboto', sans-serif;
  border-bottom: 1px solid ##borderc##;
 }
.gyges .tp-tab-image 
{ 
  width:##size##px;
  height:##size##px; 
  max-height:100%; 
  max-width:100%;
  position:relative;
  display:inline-block;
  float:left;

}
.gyges .tp-tab-content 
{
    background:##bg##; 
    position:relative;
    padding:15px 15px 15px 85px;
    left:0px;
    overflow:hidden;
    margin-top:-15px;
    box-sizing:border-box;
    color:##color##;
    display: inline-block;
    width:100%;
    height:100%;
 position:absolute; }
.gyges .tp-tab-date
  {
  display:block;
  color: ##datecolor##;
  font-weight:500;
  font-size:##datesize##px;
  margin-bottom:0px;
  }
.gyges .tp-tab-title 
{
    display:block;  
    text-align:left;
    color:##titlecolor##;
    font-size:##titlesize##px;
    font-weight:500;
    text-transform:none;
    line-height:17px;
}
.gyges .tp-tab.rs-touchhover,
.gyges .tp-tab.selected {
  background:##hbg##; 
}

.gyges .tp-tab-mask {
}

/* media queries */
@media only screen and (max-width: 960px) {

}
@media only screen and (max-width: 768px) {

}";s:6:"markup";s:160:"<div class="tp-tab-content">
  <span class="tp-tab-date">{{param1}}</span>
  <span class="tp-tab-title">{{title}}</span>
</div>
<div class="tp-tab-image"></div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"300";s:6:"height";s:2:"80";}s:12:"placeholders";a:9:{s:7:"borderc";a:3:{s:5:"title";s:12:"Border-Color";s:4:"type";s:5:"color";s:4:"data";s:22:"rgba(255,255,255,0.15)";}s:4:"size";a:3:{s:5:"title";s:4:"Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:2:"bg";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:13:"rgba(0,0,0,0)";}s:5:"color";a:3:{s:5:"title";s:13:"Content-Color";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(51,51,51,0)";}s:9:"datecolor";a:3:{s:5:"title";s:10:"Date-Color";s:4:"type";s:5:"color";s:4:"data";s:21:"rgba(255,255,255,0.5)";}s:8:"datesize";a:3:{s:5:"title";s:9:"Date-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:10:"titlecolor";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"titlesize";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"14";}s:3:"hbg";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.51)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:34;a:11:{s:2:"id";i:4002;s:6:"handle";s:5:"hades";s:4:"type";s:4:"tabs";s:4:"name";s:5:"Hades";s:3:"css";s:669:".hades .tp-tab {
  opacity:1;
 }
    
.hades .tp-tab-title
 {
      display:block;
      color:##param1##;
      font-weight:600;
      font-size:##param1size##px;
      text-align:center;
      line-height:25px;      
    } 
.hades .tp-tab-price
 {
	display:block;
    text-align:center;
    color:##param2##;
    font-size:##p2size##px;
    margin-top:10px;
   line-height:20px
}

.hades .tp-tab-button {
    display:inline-block;
    margin-top:15px;
    text-align:center;
	padding:5px 15px;
  	color:##p3##;
  	font-size:##p3size##px;
  	background:##p3bg##;
   	border-radius:4px;
   font-weight:400;
}
.hades .tp-tab-inner {
	text-align:center;
}

              ";s:6:"markup";s:175:"<div class="tp-tab-inner">
  <span class="tp-tab-title">{{param1}}</span>
  <span class="tp-tab-price">{{param2}}</span>
  <span class="tp-tab-button">{{param3}}</span>
</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:7:{s:6:"param1";a:3:{s:5:"title";s:6:"Param1";s:4:"type";s:5:"color";s:4:"data";s:7:"#333333";}s:10:"param1size";a:3:{s:5:"title";s:11:"Param1-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"18";}s:6:"param2";a:3:{s:5:"title";s:6:"Param2";s:4:"type";s:5:"color";s:4:"data";s:7:"#999999";}s:6:"p2size";a:3:{s:5:"title";s:11:"Param2-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"16";}s:2:"p3";a:3:{s:5:"title";s:6:"Param3";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:6:"p3size";a:3:{s:5:"title";s:11:"Param3-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"14";}s:4:"p3bg";a:3:{s:5:"title";s:9:"Param3-BG";s:4:"type";s:5:"color";s:4:"data";s:7:"#219bd7";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:35;a:11:{s:2:"id";i:4003;s:6:"handle";s:4:"ares";s:4:"type";s:4:"tabs";s:4:"name";s:4:"Ares";s:3:"css";s:1253:".ares .tp-tab { 
  opacity:1;      
  padding:10px;
  box-sizing:border-box;
  font-family: '##font-family##', sans-serif;
  border-bottom: ##bottom-border-size##px solid ##bottom-border-color##;
  background:##idle-bg-color##);
 }
.ares .tp-tab-image 
{ 
  width:##image-size##px;
  height:##image-size##px; max-height:100%; max-width:100%;
  position:relative;
  display:inline-block;
  float:left;

}
.ares .tp-tab-content 
{
    background:rgba(0,0,0,0); 
    position:relative;
    padding:15px 15px 15px 85px;
 left:0px;
 overflow:hidden;
 margin-top:-15px;
    box-sizing:border-box;
    color:#333;
    display: inline-block;
    width:100%;
    height:100%;
 position:absolute; }
.ares .tp-tab-date
  {
  display:block;
  color: ##param1-color##;
  font-weight:500;
  font-size:##param1-size##px;
  margin-bottom:0px;
  }
.ares .tp-tab-title 
{
    display:block;	
    text-align:left;
    color:##param2-color##;
    font-size:##param2-size##px;
    font-weight:500;
    text-transform:none;
    line-height:17px;
}
.ares .tp-tab.rs-touchhover,
.ares .tp-tab.selected {
	background:##hover-bg-color##; 
}

.ares .tp-tab-mask {
}

/* media queries */
@media only screen and (max-width: 960px) {

}
@media only screen and (max-width: 768px) {

}";s:6:"markup";s:161:"<div class="tp-tab-content">
  <span class="tp-tab-date">{{param1}}</span>
  <span class="tp-tab-title">{{param2}}</span>
</div>
<div class="tp-tab-image"></div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"250";s:6:"height";s:2:"80";}s:12:"placeholders";a:10:{s:11:"font-family";a:3:{s:5:"title";s:11:"Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:6:"Roboto";}s:19:"bottom-border-color";a:3:{s:5:"title";s:13:"Bottom-Border";s:4:"type";s:5:"color";s:4:"data";s:7:"#e5e5e5";}s:18:"bottom-border-size";a:3:{s:5:"title";s:18:"Bottom-Border-Size";s:4:"type";s:6:"custom";s:4:"data";s:1:"1";}s:10:"image-size";a:3:{s:5:"title";s:10:"Image-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"60";}s:12:"param1-color";a:3:{s:5:"title";s:13:"Param-1-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#aaaaaa";}s:11:"param1-size";a:3:{s:5:"title";s:12:"Param-1-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:12:"param2-color";a:3:{s:5:"title";s:13:"Param-2-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#333333";}s:11:"param2-size";a:3:{s:5:"title";s:12:"Param-2-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"14";}s:14:"hover-bg-color";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#eeeeee";}s:13:"idle-bg-color";a:3:{s:5:"title";s:15:"Idle-Background";s:4:"type";s:5:"color";s:4:"data";s:13:"rgba(0,0,0,0)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:36;a:11:{s:2:"id";i:4004;s:6:"handle";s:4:"hebe";s:4:"type";s:4:"tabs";s:4:"name";s:4:"Hebe";s:3:"css";s:347:".hebe .tp-tab-title {
    color:##title-color##;
    font-size:##title-size##px;
    font-weight:700;
    text-transform:uppercase;
    font-family:'##title-font##'
    margin-bottom:5px;
}

.hebe .tp-tab-desc {
	font-size:##param1-size##px;
    font-weight:400;
    color:##param1-color##;
    line-height:25px;
	font-family:'##param1-font##';
}
";s:6:"markup";s:83:"<div class="tp-tab-title">{{param1}}</div>
<div class="tp-tab-desc">{{title}}</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";i:160;s:6:"height";i:160;}s:12:"placeholders";a:6:{s:11:"title-color";a:3:{s:5:"title";s:11:"Param-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#a8d8ee";}s:10:"title-size";a:3:{s:5:"title";s:10:"Param-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:10:"title-font";a:3:{s:5:"title";s:10:"Param-Font";s:4:"type";s:11:"font-family";s:4:"data";s:11:"Roboto Slab";}s:12:"param1-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:11:"param1-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"18";}s:11:"param1-font";a:3:{s:5:"title";s:10:"Title-Font";s:4:"type";s:11:"font-family";s:4:"data";s:11:"Roboto Slab";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:37;a:11:{s:2:"id";i:4005;s:6:"handle";s:6:"hermes";s:4:"type";s:4:"tabs";s:4:"name";s:6:"Hermes";s:3:"css";s:4238:".hermes .tp-tab { 
  opacity:1;  
  box-sizing:border-box;
  padding-right:10px;
 }
 
.hermes .tp-tab-content-wrapper {
  position:absolute;
  width:100%;
  min-height:40%;
  bottom:0px;
  box-sizing:border-box;
  padding-right:10px;
  overflow:hidden;
}
.hermes .tp-tab-bg {
  position:absolute; 
  top:0px;
  left:-10px; 
  width:100%;height:100%;
  background:##back-color##; 
}
.hermes .tp-tab-image 
{ 
  width:100%;
  height:60%;
  position:relative;
}
.hermes .tp-tab-content 
{
  position:relative;
  padding:##padding##;
  box-sizing:border-box;
  display:block;
  width:100%;
 }
.hermes .tp-tab-date
  {
  display:block;
  color:##param1-color##;
  font-weight:600;
  font-size:##param1-size##px;
  margin-bottom:10px;
  }
.hermes .tp-tab-title 
{
    display:block;	
    color:##param2-color##;
    font-size:##param2-size##px;
    font-weight:800;
    text-transform:uppercase;
   line-height:##param2-size##px;
}

.hermes .tp-tab.selected .tp-tab-content-wrapper:after {
  width: 0px;
	height: 0px;
	border-style: solid;
	border-width: 25px 0 25px 10px;
	border-color: transparent transparent transparent ##back-color##;
	content:' ';
    position:absolute;
    right:0px;
    bottom:50%;
    margin-bottom:-25px;
}


/* media queries */
@media only screen and (max-width: 960px) {
  .hermes .tp-tab .tp-tab-title {font-size:14px;line-height:16px;}
  .hermes .tp-tab-date { font-size:11px; line-height:13px;margin-bottom:10px;}
  .hermes .tp-tab-content { padding:15px 15px 15px 25px;}
}
@media only screen and (max-width: 768px) {
  .hermes .tp-tab .tp-tab-title {font-size:12px;line-height:14px;}
  .hermes .tp-tab-date {font-size:10px; line-height:12px;margin-bottom:5px;}
  .hermes .tp-tab-content {padding:10px 10px 10px 20px;}
}

/* BOTTOM HORIZONTAL */
.hermes .nav-pos-ver-bottom.nav-dir-horizontal .tp-tab-image             { margin-top:40%; }
.hermes .nav-pos-ver-bottom.nav-dir-horizontal .tp-tab-content-wrapper   { position:absolute; bottom:auto;top:0px; padding-top:10px;}
.hermes .nav-pos-ver-bottom.nav-dir-horizontal                           { padding-right:0px; }
.hermes .nav-pos-ver-bottom.nav-dir-horizontal .tp-tab-bg                { left:0px; top:10px;}
.hermes .nav-pos-ver-bottom.nav-dir-horizontal.tp-tab.selected .tp-tab-content-wrapper:after {  
  border-width: 0px 25px 10px 25px;
  border-color: transparent transparent ##back-color## transparent;
  top:0px;
  left:50%;
  margin-left:0px 0px 0px -25px;
}

/* CENTER HORIZONTAL */
.hermes .nav-pos-ver-center.nav-dir-horizontal .tp-tab-image             { margin-top:40%; }
.hermes .nav-pos-ver-center.nav-dir-horizontal .tp-tab-content-wrapper   { position:absolute; bottom:auto;top:0px; padding-top:10px;}
.hermes .nav-pos-ver-center.nav-dir-horizontal                           { padding-right:0px; }
.hermes .nav-pos-ver-center.nav-dir-horizontal .tp-tab-bg                { left:0px; top:10px;}
.hermes .nav-pos-ver-center.nav-dir-horizontal.tp-tab.selected .tp-tab-content-wrapper:after {  
  border-width: 0px 25px 10px 25px;
  border-color: transparent transparent ##back-color## transparent;
  top:0px;
  left:50%;
  margin:0px 0px 0px -25px;
}

/* BOTTOM HORIZONTAL */
.hermes .nav-pos-ver-top.nav-dir-horizontal .tp-tab-content-wrapper   { padding-bottom:10px;}
.hermes .nav-pos-ver-top.nav-dir-horizontal                           { padding-right:0px; }
.hermes .nav-pos-ver-top.nav-dir-horizontal .tp-tab-bg                { left:0px; top:-10px;}
.hermes .nav-pos-ver-top.nav-dir-horizontal.tp-tab.selected .tp-tab-content-wrapper:after {  
  border-width: 10px 25px 0px 25px;
  border-color: ##back-color## transparent transparent transparent;
  bottom:0px;
  left:50%;
  margin:0px 0px 0px -25px;
}

/* RIGHT VEERTICAL */
.hermes .nav-pos-hor-right.nav-dir-vertical .tp-tab-content-wrapper { padding-left:10px; padding-right:0px; left:0px;} 
.hermes .nav-pos-hor-right.nav-dir-vertical { padding-left:10px; padding-right:0px;}
.hermes .nav-pos-hor-right.nav-dir-vertical .tp-tab-bg  { left:10px;}
.hermes .nav-pos-hor-right.nav-dir-vertical.tp-tab.selected .tp-tab-content-wrapper:after {  
  border-width: 25px 10px 25px 0px;
  border-color:transparent  ##back-color## transparent transparent;
  right:auto;
  left:0px;    
}

";s:6:"markup";s:241:"<span class="tp-tab-image"></span>
<span class="tp-tab-content-wrapper">
<span class="tp-tab-bg"></span>
<span class="tp-tab-content">
	<span class="tp-tab-date">{{param1}}</span>
	<span class="tp-tab-title">{{param2}}</span>
</span>
</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"240";s:6:"height";s:3:"260";}s:12:"placeholders";a:6:{s:10:"back-color";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:12:"param1-color";a:3:{s:5:"title";s:13:"Param-1-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#888888";}s:12:"param2-color";a:3:{s:5:"title";s:13:"Param-2-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:11:"param1-size";a:3:{s:5:"title";s:12:"Param-1-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"12";}s:11:"param2-size";a:3:{s:5:"title";s:12:"Param-2-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"16";}s:7:"padding";a:3:{s:5:"title";s:7:"Padding";s:4:"type";s:6:"custom";s:4:"data";s:4:"20px";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:38;a:11:{s:2:"id";i:4009;s:6:"handle";s:7:"erinyen";s:4:"type";s:4:"tabs";s:4:"name";s:7:"Erinyen";s:3:"css";s:448:".erinyen .tp-tab-title {
    color:##title-color##;
    font-size:##title-size##px;
    font-weight:##title-font-weight##;
    text-transform:uppercase;
    font-family:'##title-font##';
    margin-bottom:5px;
    line-height:##title-line-height##px;
}

.erinyen .tp-tab-desc {
	font-size:##desc-size##px;
    font-weight:##desc-font-weight##;
    color:##desc-color##;
    line-height:##desc-line-height##px;
	font-family:'##desc-font##';
}
      ";s:6:"markup";s:88:"<div class="tp-tab-title">{{title}}</div>
<div class="tp-tab-desc">{{description}}</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:3:"160";}s:12:"placeholders";a:10:{s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#a8d8ee";}s:10:"desc-color";a:3:{s:5:"title";s:17:"Description-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"title-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:9:"desc-size";a:3:{s:5:"title";s:16:"Description-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"18";}s:10:"title-font";a:3:{s:5:"title";s:10:"Title-Font";s:4:"type";s:11:"font-family";s:4:"data";s:11:"Roboto Slab";}s:9:"desc-font";a:3:{s:5:"title";s:16:"Description-Font";s:4:"type";s:11:"font-family";s:4:"data";s:11:"Roboto Slab";}s:17:"title-line-height";a:3:{s:5:"title";s:17:"Title-Line-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"15";}s:16:"desc-line-height";a:3:{s:5:"title";s:16:"Desc-Line-Height";s:4:"type";s:6:"custom";s:4:"data";s:2:"25";}s:17:"title-font-weight";a:3:{s:5:"title";s:17:"Title-Font-Weight";s:4:"type";s:6:"custom";s:4:"data";s:3:"700";}s:16:"desc-font-weight";a:3:{s:5:"title";s:16:"Desc-Font-Weight";s:4:"type";s:6:"custom";s:4:"data";s:3:"400";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:39;a:11:{s:2:"id";i:4010;s:6:"handle";s:4:"zeus";s:4:"type";s:4:"tabs";s:4:"name";s:4:"Zeus";s:3:"css";s:449:".zeus .tp-tab { 
  opacity:1;      
  box-sizing:border-box;
}

.zeus .tp-tab-title { 
display: block;
text-align: center;
background: ##bg-color##;
font-family: '##title-font##', serif; 
font-weight: 700; 
font-size: ##font-size##px; 
line-height: ##font-size##px;
color: ##color##; 
padding: ##padding##; }

.zeus .tp-tab.rs-touchhover .tp-tab-title,
.zeus .tp-tab.selected .tp-tab-title {
  color: ##hover-color##;
  background:##back-hover##; 
}";s:6:"markup";s:43:"<span class="tp-tab-title">{{title}}</span>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"160";s:6:"height";s:2:"31";}s:12:"placeholders";a:7:{s:8:"bg-color";a:3:{s:5:"title";s:7:"BG-RGBA";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:10:"back-hover";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:5:"color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:11:"hover-color";a:3:{s:5:"title";s:17:"Hover-Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#000000";}s:9:"font-size";a:3:{s:5:"title";s:10:"Title-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"13";}s:10:"title-font";a:3:{s:5:"title";s:17:"Title-Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:11:"Roboto Slab";}s:7:"padding";a:3:{s:5:"title";s:7:"Padding";s:4:"type";s:6:"custom";s:4:"data";s:8:"9px 10px";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}i:40;a:11:{s:2:"id";i:4011;s:6:"handle";s:5:"metis";s:4:"type";s:4:"tabs";s:4:"name";s:5:"Metis";s:3:"css";s:2099:".metis .tp-tab-number {
    color:##title-color##;
    font-size:##title-size##px;
    line-height:30px;
    font-weight:##title-weight##;
    font-family: '##font-family##';
    width: ##basicwidth##px;   
    display: inline-block;
	position:absolute;
    text-align:center;
    box-sizing:border-box;
}


.metis .tp-tab-mask {
   left:0px;
   top:0px;
   max-width:##basicwidth## !important;   
   line-height:30px;
   transition:0.4s padding-left, 0.4s left, 0.4s max-width;
}

.metis:hover .tp-tab-mask{
   left:15px;
   padding-left:0px;
   max-width:500px !important;
}

.metis .tp-tab-divider { 
	border-right: 1px solid transparent;
    height: 30px;
    width: 1px;
    display: inline-block;
    position:absolute;
    left:##basicwidth##px;
    transition:0.4s all;
}

.metis .tp-tab-title {
    color:##desc-color##;
    font-size:##desc-size##px;
    line-height:##desc-size##px;
    font-weight:##desc-font-weight##;
    font-family: '##font-family##';
    position:relative;
    line-height:30px;
    padding-left: 30px;
    display: inline-block;
    transform:translatex(-100%);
    transition:0.4s all;
}

.metis .tp-tab-title-mask {
   position:absolute;
   overflow:hidden;
   left:##basicwidth##px; 
}

.metis:hover .tp-tab-title {
   transform:translatex(0);
 }

.metis .tp-tab { 
	opacity: 0.15;
    transition:0.4s all;
}

.metis .tp-tab.rs-touchhover,
.metis .tp-tab.selected {
    opacity: 1; 
}

.metis .tp-tab.selected .tp-tab-divider {
	border-right: 1px solid #cdb083;
}

.metis:hover .tp-tab-divider {
	margin-left:15px;
}

.metis.tp-tabs {
   max-width:##basicwidth##px !important;  
}
  
.metis.tp-tabs:before {
 content:' ';
 height:100%;
 width:##basicwidth##px; 
 border-right:1px solid rgba(255,255,255,0.10);
 left:0px;
 top:0px;
 position:absolute;
 transition:0.4s all;
 background:##bgcolor##;
 box-sizing:content-box !important;
 padding:0px;
 }
 
 .metis.tp-tabs.rs-touchhover:before{
  width:##basicwidth##px;
  background:##bghovercolor##;
  padding:0px 15px;
 }
     
 @media (max-width:499px){
 .metis.tp-tabs:before {
 background:##handybg##;
 }
 }
 ";s:6:"markup";s:195:"<div class="tp-tab-wrapper">
<div class="tp-tab-number">{{param1}}</div>
<div class="tp-tab-divider"></div>
<div class="tp-tab-title-mask">
<div class="tp-tab-title">{{title}}</div>
</div>
</div>";s:7:"factory";b:1;s:3:"dim";a:2:{s:5:"width";s:3:"300";s:6:"height";s:2:"40";}s:12:"placeholders";a:11:{s:11:"font-family";a:3:{s:5:"title";s:11:"Font-Family";s:4:"type";s:11:"font-family";s:4:"data";s:16:"Playfair Display";}s:11:"title-color";a:3:{s:5:"title";s:11:"Title-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:10:"title-size";a:3:{s:5:"title";s:15:"Title-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"40";}s:10:"desc-color";a:3:{s:5:"title";s:10:"Desc-Color";s:4:"type";s:5:"color";s:4:"data";s:7:"#ffffff";}s:9:"desc-size";a:3:{s:5:"title";s:14:"Desc-Font-Size";s:4:"type";s:6:"custom";s:4:"data";s:2:"20";}s:16:"desc-font-weight";a:3:{s:5:"title";s:16:"Desc-Font-Weight";s:4:"type";s:6:"custom";s:4:"data";s:3:"400";}s:12:"title-weight";a:3:{s:5:"title";s:12:"Title-Weight";s:4:"type";s:6:"custom";s:4:"data";s:3:"400";}s:10:"basicwidth";a:3:{s:5:"title";s:11:"Basic-Width";s:4:"type";s:6:"custom";s:4:"data";s:2:"80";}s:7:"bgcolor";a:3:{s:5:"title";s:10:"Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.15)";}s:12:"bghovercolor";a:3:{s:5:"title";s:16:"Hover-Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.25)";}s:7:"handybg";a:3:{s:5:"title";s:16:"Handy-Background";s:4:"type";s:5:"color";s:4:"data";s:16:"rgba(0,0,0,0.75)";}}s:7:"presets";a:0:{}s:7:"version";s:5:"6.0.0";}}}