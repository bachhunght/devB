/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

(function(e){function k(a){return $widgetkit.css3(a)}var r=$widgetkit.support,l=function(){};l.prototype=e.extend(l.prototype,{name:"slideshow",options:{index:0,width:"auto",height:"auto",autoplay:!0,interval:5E3,navbar_items:4,caption_animation_duration:500,kenburns_animation_duration:null,slices:20,duration:500,animated:"random",easing:"swing"},nav:null,navbar:null,captions:null,caption:null,kbi:0,initialize:function(a,b){var c=this;this.options=e.extend({},this.options,b);this.element=this.wrapper=
a;this.ul=this.wrapper.find("ul.slides:first").css({width:"100%",overflow:"hidden"});this.wrapper.css({position:"relative"});this.slides=this.ul.css({position:"relative"}).children().css({top:"0px",left:"0px",position:"absolute"}).hide();this.index=this.slides[this.options.index]?this.options.index:0;e(".next",this.wrapper).bind("click",function(){c.stop();c.nextSlide()});e(".prev",this.wrapper).bind("click",function(){c.stop();c.prevSlide()});if(this.wrapper.find(".nav:first").length){this.nav=this.wrapper.find(".nav:first");
var d=this.nav.children();d.each(function(a){e(this).bind("click",function(){c.stop();c.slides[a]&&c.show(a)})});a.bind("slideshow-show",function(a,c,b){e(d.removeClass("active").get(b)).addClass("active")})}this.wrapper.find(".captions:first").length&&this.wrapper.find(".caption:first").length&&(this.captions=this.wrapper.find(".captions:first").hide().children(),this.caption=this.wrapper.find(".caption:first").hide());this.nav&&e(this.nav.children().get(this.index)).addClass("active");this.navbar&&
e(this.navbar.children().get(this.index)).addClass("active");this.showCaption(this.index);this.timer=null;this.hover=!1;this.wrapper.hover(function(){c.hover=!0},function(){c.hover=!1});"ontouchend"in document&&(a.bind("touchstart",function(c){function b(a){if(g){var c=a.originalEvent.touches?a.originalEvent.touches[0]:a;j={time:(new Date).getTime(),coords:[c.pageX,c.pageY]};10<Math.abs(g.coords[0]-j.coords[0])&&a.preventDefault()}}var d=c.originalEvent.touches?c.originalEvent.touches[0]:c,g={time:(new Date).getTime(),
coords:[d.pageX,d.pageY],origin:e(c.target)},j;a.bind("touchmove",b).one("touchend",function(){a.unbind("touchmove",b);g&&j&&1E3>j.time-g.time&&(30<Math.abs(g.coords[0]-j.coords[0])&&75>Math.abs(g.coords[1]-j.coords[1]))&&g.origin.trigger("swipe").trigger(g.coords[0]>j.coords[0]?"swipeleft":"swiperight");g=j=void 0})}),this.wrapper.bind("swipeleft",function(){c.stop();c.nextSlide()}).bind("swiperight",function(){c.stop();c.prevSlide()}));e(window).bind("debouncedresize",function(){c.resize()});c.resize();
c.slides.eq(c.index).css("z-index",2).show();"kenburns"==c.options.animated&&r.canvas&&c.show(this.index,!0);c.options.autoplay&&c.start()},resize:function(){this.fx&&(this.slicer&&this.slicer.remove(),this.slides.filter(":animated").stop(!0,!0),this.next.css({top:0,left:0,"z-index":2}).show(),"kenburns"==this.options.animated&&r.canvas&&(this.element.find("img:animated").stop().css({width:"",height:"",top:"",left:""}).fadeIn("fast"),this.element.find("canvas.tmp").remove()),this.current.css({top:0,
left:0,"z-index":1}).hide());this.fx=!1;var a=this.options.width,b=this.options.height;this.slides.css("width","");this.slides.css("height","");this.ul.css("height","");this.wrapper.css("width","");"auto"!=a&&this.wrapper.width()<a&&(b=a="auto");this.wrapper.css({width:"auto"==a?this.wrapper.width():a});var a=this.ul.width(),c=b;"auto"==c&&(c=0,this.slides.css("width",a).show().each(function(){c=Math.max(c,e(this).height())}).hide().eq(this.index).show());this.slides.css({height:c,width:this.ul.width()});
this.ul.css("height",c);"kenburns"==this.options.animated&&r.canvas&&this.show(this.index,!0)},nextSlide:function(){this.show(this.slides[this.index+1]?this.index+1:0)},prevSlide:function(){this.show(-1<this.index-1?this.index-1:this.slides.length-1)},show:function(a,b){this.index==a&&!b||this.fx&&"kenburns"!=this.options.animated||(this.current=e(this.slides.get(this.index)),this.next=e(this.slides.get(a)),this.animated=this.options.animated,this.duration=this.options.duration,this.easing=this.options.easing,
this.dir=a>this.index?"right":"left",this.init=b,this.showCaption(a),this.element.trigger("slideshow-show",[this.index,a]),this.index=a,this[this.animated]?(this.fx=!0,this[this.animated]()):(this.current.hide(),this.next.show()))},showCaption:function(a){if(this.caption&&this.captions[a]){var b=e(this.captions.get(a)).html();this.caption.is(":animated")&&this.caption.stop();if(e.trim(b).length)if(e.fn.lightbox&&b.match(/data\-lightbox/)&&(b=e("<div>"+b+"</div>"),b.find("a[data-lightbox]").lightbox()),
this.caption.is(":visible")){var c=this;this.caption.fadeOut(this.options.caption_animation_duration,function(){e(this).html(b).delay(200).css("opacity","").fadeIn(c.options.caption_animation_duration)})}else this.caption.html(b).fadeIn(this.options.caption_animation_duration);else this.caption.is(":visible")&&this.caption.fadeOut(this.options.caption_animation_duration)}},start:function(){if(!this.timer){var a=this;this.timer=setInterval(function(){("kenburns"==a.options.animated||!a.hover&&!a.fx)&&
a.nextSlide()},this.options.interval)}},stop:function(){if(this.timer){clearInterval(this.timer);this.tmptimer&&clearTimeout(this.tmptimer);var a=this;this.tmptimer=setTimeout(function(){a.start();this.tmptimer=!1},3E4);this.timer=!1}},bindTransitionEnd:function(a){var b=this;e(a).bind("webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd",function(){b.fx=null;b.next.css({"z-index":"2",left:0,top:0}).show();b.current.hide();b.slicer&&b.slicer.remove()})},randomSimple:function(){var a=
"top bottom fade slide scroll swipe".split(" ");this.animated=a[Math.floor(Math.random()*a.length)];this[this.animated]()},randomFx:function(){var a="sliceUp sliceDown sliceUpDown fold puzzle boxes boxesReverse".split(" ");this.animated=a[Math.floor(Math.random()*a.length)];this[this.animated]()},top:function(){var a=this;this.current.css({"z-index":1});this.next.css({"z-index":2,display:"block",left:0,top:this.wrapper.height()*("bottom"==this.animated?2:-1)}).animate({top:0},{duration:a.duration,
easing:a.easing,complete:function(){a.fx=null;a.current.hide()}})},bottom:function(){this.top.apply(this)},left:function(){var a=this;this.current.css({"z-index":1});this.next.css({"z-index":2,display:"block",left:this.current.width()*("right"==this.animated?2:-1)}).animate({left:0},{duration:a.duration,easing:this.easing,complete:function(){a.fx=null;a.current.hide()}})},right:function(){this.left()},slide:function(){var a=this;this.current.css({"z-index":1});this.next.css({"z-index":2,display:"block",
left:this.current.width()*("right"==this.dir?2:-1)}).animate({left:0},{duration:a.duration,easing:this.easing,complete:function(){a.fx=null;a.current.hide()}})},fade:function(){var a=this;this.next.css({top:0,left:0,"z-index":1}).fadeIn(a.duration);this.current.css({"z-index":2}).fadeOut(this.duration,function(){a.fx=null;a.current.hide().css({opacity:1})})},scrollLeft:function(){var a=this;this.current.css({"z-index":1});this.next.css({"z-index":2,display:"block",left:this.current.width()*("scrollRight"==
this.animated?1:-1)}).animate({left:0},{duration:a.duration,easing:this.easing,complete:function(){a.fx=null;a.current.hide()},step:function(b,c){a.current.css("left",(Math.abs(c.start)-Math.abs(b))*("scrollRight"==a.animated?-1:1))}})},scrollRight:function(){this.scrollLeft(this)},scroll:function(){var a=this;this.current.css({"z-index":1});this.next.css({"z-index":2,display:"block",left:this.current.width()*("right"==this.dir?1:-1)}).animate({left:0},{duration:a.duration,easing:this.easing,complete:function(){a.fx=
null;a.current.hide()},step:function(b,c){a.current.css("left",(Math.abs(c.start)-Math.abs(b))*("right"==a.dir?-1:1))}})},swipe:function(){var a=this;this.current.css({"z-index":2});this.next.css({"z-index":1,top:0,left:this.next.width()/3*("right"==a.dir?1:-1)}).show();var b=e("<div></div>").css({position:"absolute",top:0,left:0,width:this.current.outerWidth(),height:this.current.outerHeight(),opacity:0,"background-color":"#000"}).appendTo(this.current),c=e("<div></div>").css({position:"absolute",
top:0,left:0,width:this.current.outerWidth(),height:this.current.outerHeight(),opacity:0.6,"background-color":"#000"}).appendTo(this.next);b.animate({opacity:0.6},{duration:a.duration});c.animate({opacity:0},{duration:a.duration});this.current.animate({left:("right"==a.dir?-1:1)*this.current.width()},{duration:a.duration,easing:"easeOutCubic",complete:function(){a.fx=null;a.current.hide();b.remove();c.remove()}});this.next.animate({left:0},{duration:a.duration,easing:"easeOutCubic"})},slice:function(){var a=
this,b=this.next.find("img:first"),c="sliceUp"==this.animated?"bottom":"top";if(b.length){var d=this.current.find("img:first").position(),h=a.next.width(),m=a.next.height();s(this,d.top,d.left);for(var d=Math.round(this.slicer.width()/this.options.slices),f=0;f<this.options.slices;f++){var g=f==this.options.slices-1?this.slicer.width()-d*f:d;"sliceUpDown"==this.animated&&(c=0==(f%2+2)%2?"top":"bottom");g=e("<div />").css(c,0).css(k({position:"absolute",left:d*f+"px",width:g+"px",height:0,background:"url("+
b.attr("src")+") no-repeat -"+(d+f*d-d)+"px "+c,"background-size":h+"px "+m+"px",opacity:0,transition:"all "+a.duration+"ms ease-in "+60*f+"ms"}));this.slicer.append(g)}this.slices=this.slicer.children();this.bindTransitionEnd.apply(this,[this.slices.get(this.slices.length-1)]);this.current.css({"z-index":1});this.slicer.show();var j=this.wrapper.height();if(r.transition)this.slices.css(k({height:j,opacity:1}));else{var t=0;this.slices.each(function(c){var b=e(this);setTimeout(function(){b.animate({height:j,
opacity:1},a.duration,function(){c==a.slices.length-1&&e(this).trigger("transitionend")})},t);t+=60})}}else this.next.css({"z-index":"2",left:0,top:0}).show(),this.current.hide(),this.fx=null},sliceUp:function(){this.slice.apply(this)},sliceDown:function(){this.slice.apply(this)},sliceUpDown:function(){this.slice.apply(this)},fold:function(){var a=this,b=this.next.find("img:first");if(b.length){var c=this.current.find("img:first").position(),d=a.next.width(),h=a.next.height();s(this,c.top,c.left);
for(var m=Math.round(this.slicer.width()/this.options.slices)+2,c=this.current.height(),f=0;f<this.options.slices+1;f++){var g=f==a.options.slices?a.slicer.width()-m*f:m,g=e("<div />").css(k({position:"absolute",left:m*f+"px",width:g,top:"0px",height:c,background:"url("+b.attr("src")+") no-repeat -"+(m+f*m-m)+"px 0%","background-size":d+"px "+h+"px",opacity:0,transform:"scalex(0.0001)",transition:"all "+a.duration+"ms ease-in "+(100+60*f)+"ms"}));this.slicer.append(g)}this.slices=this.slicer.children();
this.bindTransitionEnd.apply(this,[this.slices.get(this.slices.length-1)]);this.current.css({"z-index":1});this.slicer.show();if(r.transition)this.slices.css(k({opacity:1,transform:"scalex(1)"}));else{var j=0;this.slices.width(0).each(function(c){var b=c==a.options.slices-1?a.slicer.width()-m*c:m,d=e(this);setTimeout(function(){d.animate({opacity:1,width:b},a.duration,function(){c==a.slices.length-1&&e(this).trigger("transitionend")})},j+100);j+=50})}}else this.next.css({"z-index":"2",left:0,top:0}).show(),
this.current.hide(),this.fx=null},puzzle:function(){var a=this,b=Math.round(this.options.slices/2),c=Math.round(this.wrapper.width()/b),d=Math.round(this.wrapper.height()/c),h=Math.round(this.wrapper.height()/d)+1,m=this.next.find("img:first");if(m.length){var f=this.current.find("img:first").position(),g=a.next.width(),j=a.next.height();s(this,f.top,f.left);for(var f=this.wrapper.width(),t=0;t<d;t++)for(var n=0;n<b;n++){var l=e("<div />").css(k({position:"absolute",left:c*n+"px",width:n==b-1?f-c*
n+"px":c+"px",top:h*t+"px",height:h+"px",background:"url("+m.attr("src")+") no-repeat -"+(c+n*c-c)+"px -"+(h+t*h-h)+"px","background-size":g+"px "+j+"px",opacity:0,"-webkit-transform":"translateZ(0)","-moz-transform":"rotate(0)",transition:"all "+a.duration+"ms ease-in 0ms"}));this.slicer.append(l)}for(var b=this.slicer.children(),p,q,c=b.length;c;p=parseInt(Math.random()*c),q=b[--c],b[c]=b[p],b[p]=q);this.slices=b;this.bindTransitionEnd.apply(this,[this.slices.get(this.slices.length-1)]);this.current.css({"z-index":1});
this.slicer.show();this.slices.each(function(c){var b=e(this);setTimeout(function(){r.transition?b.css(k({opacity:1})):b.animate({opacity:1},a.duration,function(){c==a.slices.length-1&&e(this).trigger("transitionend")})},100+50*c)})}else this.next.css({"z-index":"2",left:0,top:0}).show(),this.current.hide(),this.fx=null},boxes:function(){var a=this,b=Math.round(this.options.slices/2),c=Math.round(this.wrapper.width()/b),d=Math.round(this.wrapper.height()/c),h=Math.round(this.wrapper.height()/d)+1,
m=0,f=this.next.find("img:first");if(f.length){var g=this.current.find("img:first").position(),j=a.next.width(),l=a.next.height();s(this,g.top,g.left);for(g=0;g<d;g++)for(var n=0;n<b;n++)this.slicer.append(e("<div />").css(k({position:"absolute",left:c*n+"px",width:0,top:h*g+"px",height:0,background:"url("+f.attr("src")+") no-repeat -"+(c+n*c-c)+"px -"+(h+g*h-h)+"px","background-size":j+"px "+l+"px",opacity:0,transition:"all "+(100+a.duration)+"ms ease-in 0ms"})).data("base",{width:n==b-1?this.wrapper.width()-
c*n:c,height:h}));this.slices=this.slicer.children();this.current.css({"z-index":1});this.slicer.show();var u=0,p=0,q=[];q[u]=[];c="boxesReverse"==this.animated?this.slices._reverse():this.slices;this.bindTransitionEnd.apply(this,[c.get(c.length-1)]);c.each(function(){q[u][p]=e(this);p++;p==b&&(u++,p=0,q[u]=[])});for(n=h=0;n<b*d;n++){f=n;for(g=0;g<d;g++)0<=f&&f<b&&(function(c,b,d,g){var f=q[c][b];setTimeout(function(){r.transition?f.css({opacity:"1",width:f.data("base").width,height:f.data("base").height}):
f.animate({opacity:"1",width:f.data("base").width,height:f.data("base").height},a.duration,function(){g==a.slices.length-1&&e(this).trigger("transitionend")})},100+d)}(g,f,m,h,c.length),h++),f--;m+=100}}else this.next.css({"z-index":"2",left:0,top:0}).show(),this.current.hide(),this.fx=null},boxesReverse:function(){this.boxes.apply(this)},kenburns:function(){var a=this,b=this.next.find("img:first"),c=a.options.kenburns_animation_duration||2*a.options.interval;if(b.length)if(r.canvas){b.stop(!1,!0).css({width:"",
height:""});this.slides.not(this.current).not(this.next).hide();this.current.css({"z-index":1});this.next.css({"z-index":2,visibility:"hidden",opacity:1}).show();this.next.find("canvas.tmp").remove();b.position();var d=b.attr("width"),h=b.attr("height"),m=[{start:["c-l",1],stop:["c-r",1.2]},{start:["t-r",1],stop:["b-l",1.2]},{start:["b-l",1],stop:["t-r",1.2]},{start:["t-c",1],stop:["b-c",1.2]},{start:["c-c",1],stop:["c-c",1.2]},{start:["b-r",1],stop:["t-l",1.2]},{start:["c-l",1],stop:["c-r",1.2]}],
f=m[this.kbi?this.kbi:0],g=e('<canvas class="tmp"></canvas>'),j=function(a,c){c=c||1;var b={top:0,left:0,width:d*c,height:h*c};switch(a){case "t-l":b.top=b.left=0;break;case "t-c":b.top=0;b.left=-1*((b.width-d)/2);break;case "t-r":b.top=0;b.left=-1*(b.width-d);break;case "c-l":b.top=-1*((b.height-h)/2);b.left=0;break;case "c-c":b.top=-1*((b.height-h)/2);b.left=-1*((b.width-d)/2);break;case "c-r":b.top=-1*((b.height-h)/2);b.left=-1*(b.width-d);break;case "b-l":b.top=-1*(b.height-h);b.left=0;break;
case "b-c":b.top=-1*(b.height-h);b.left=-1*((b.width-d)/2);break;case "b-r":b.top=-1*(b.height-h),b.left=-1*(b.width-d)}return b};if(d>this.ul.width()){var k=d/this.ul.width(),d=this.ul.width(),h=h/k;this.ul.height(h).css("overflow","hidden").css("z-index","4")}g.attr({width:d,height:h}).css({width:d,height:h,opacity:0});b.css({width:"",height:"",top:"",left:""}).after(g).hide();var n=g.get(0).getContext("2d");this.next.css({visibility:"visible"});g.animate({opacity:1},a.duration);var l=!1,p=!1,q=
!1,s=!1;b.css(j.apply(this,f.start)).animate(j.apply(this,f.stop),{step:function(a,c){!1!==l&&(!1!==p&&!1!==q&&!1!==s)&&(n.drawImage(b.get(0),l,p,q,s),s=q=p=l=!1);"width"==c.prop&&(q=a);"height"==c.prop&&(s=a);"left"==c.prop&&(l=a);"top"==c.prop&&(p=a)},complete:function(){e(this).css({width:"",height:"",top:"",left:""});a.fx=null},easing:"swing",duration:c});a.kbi=m[a.kbi+1]?a.kbi+1:0}else this.fade(this);else this.next.css({"z-index":"2",left:0,top:0}).show(),this.current.hide(),this.fx=null},scale:function(){var a=
this;r.transition?(this.fx=null,this.ul.css({"-webkit-transform":"translateZ(0)"}),this.slides.css(k({transition:"none",transform:"none",opacity:1})),this.slides.not(this.current).hide(),this.current.one("webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd",function(){a.next.css({"z-index":"2",left:0,top:0,opacity:1}).show();e(this).hide().css(k({transition:"none",transform:"none",opacity:1}))}).css(k({"z-index":2,opacity:1,transform:"scale(1)",transition:"all "+a.duration+"ms ease-in-out 0ms"})),
this.next.css(k({"z-index":1,opacity:1,transform:"none"})).show(),a.current.css({"z-index":2}).css(k({opacity:0,transform:"scale(1.5)"}))):this.fade(this)},rotate:function(){if(r.transition){this.fx=null;var a=this,b=this.current,c=[["rotate(90deg) translate(200%, -10%) scale(0.2)","rotate(-90deg) translate(-200%, -10%) scale(0.2)"],["rotate(-90deg) translate(-200%, -10%) scale(0.2)","rotate(90deg) translate(200%, -10%) scale(0.2)"],["rotate(-90deg) translate(200%, -90%) scale(0.2)","rotate(90deg) translate(-200%, -90%) scale(0.2)"],
["rotate(90deg) translate(-200%, -90%) scale(0.2)","rotate(-90deg) translate(200%, -90%) scale(0.2)"],["rotate(90deg) translate(200%, -10%) scale(0.2)","rotate(90deg) translate(-200%, -90%) scale(0.2)"],["rotate(-90deg) translate(-200%, -10%) scale(0.2)","rotate(-90deg) translate(200%, -90%) scale(0.2)"],["rotate(90deg) translate(-200%, -90%) scale(0.2)","rotate(90deg) translate(200%, -10%) scale(0.2)"],["rotate(-90deg) translate(200%, -90%) scale(0.2)","rotate(-90deg) translate(-200%, -10%) scale(0.2)"],
["rotate(10deg) translate(200%, 20%) scale(0.2)","rotate(10deg) translate(-200%, -20%) scale(0.2)"],["rotate(10deg) translate(-200%, -20%) scale(0.2)","rotate(10deg) translate(200%, 20%) scale(0.2)"],["rotate(-10deg) translate(200%, -20%) scale(0.2)","rotate(-10deg) translate(-200%, 20%) scale(0.2)"],["rotate(-10deg) translate(-200%, 20%) scale(0.2)","rotate(-10deg) translate(200%, -20%) scale(0.2)"],["translate(50%, 200%) scale(0.2)","translate(-50%, -200%) scale(0.2)"],["translate(-50%, -200%) scale(0.2)",
"translate(50%, 200%) scale(0.2)"],["translate(50%, -200%) scale(0.2)","translate(-50%, 200%) scale(0.2)"],["translate(-50%, 200%) scale(0.2)","translate(50%, -200%) scale(0.2)"]],d=parseInt(Math.random()*c.length);this.slides.not(this.current).hide();this.current.css({"z-index":1}).css(k({opacity:1,transform:"rotate(0deg) translate(0, 0) scale(1)",transition:"all "+this.duration+"ms ease-in-out 0ms"}));this.next.css(k({"z-index":"2",left:0,top:0,opacity:0,transform:c[d][0],transition:"all "+this.duration+
"ms ease-in-out 0ms"})).show();this.next.one("webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd",function(){a.slides.filter(":visible").css(k({transition:"",transform:""}));b.css(k({transition:"",transform:""})).hide()});setTimeout(function(){a.next.css(k({opacity:1,transform:"rotate(0deg) translate(0, 0) scale(1)"}));a.current.css(k({opacity:0,transform:c[d][1]}))},10)}else this.fade(this)}});e.fn._reverse=[].reverse;var s=function(a,b,c){b=b||0;c=c||0;a.slicer=e("<li />").addClass("slices").css({top:b,
left:c,position:"absolute",width:a.wrapper.width(),height:a.ul.height(),"z-index":3}).hide().appendTo(a.ul)};e.fn[l.prototype.name]=function(){var a=arguments,b=a[0]?a[0]:null;return this.each(function(){var c=e(this);if(l.prototype[b]&&c.data(l.prototype.name)&&"initialize"!=b)c.data(l.prototype.name)[b].apply(c.data(l.prototype.name),Array.prototype.slice.call(a,1));else if(!b||e.isPlainObject(b)){var d=new l;l.prototype.initialize&&d.initialize.apply(d,e.merge([c],a));c.data(l.prototype.name,d)}else e.error("Method "+
b+" does not exist on jQuery."+l.name)})}})(jQuery);