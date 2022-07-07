jQuery(function(t){if("undefined"==typeof wc_add_to_cart_params)return!1;var a=function(){t(document).on("click",".add_to_cart_button",this.onAddToCart).on("added_to_cart",this.updateButton).on("added_to_cart",this.updateCartPage).on("added_to_cart",this.updateFragments)};a.prototype.onAddToCart=function(a){var d=t(this);if(d.is(".ajax_add_to_cart")){if(!d.attr("data-product_id"))return!0;a.preventDefault(),d.removeClass("added"),d.addClass("loading");var o={};t.each(d.data(),function(t,a){o[t]=a}),t(document.body).trigger("adding_to_cart",[d,o]),t.post(wc_add_to_cart_params.wc_ajax_url.toString().replace("%%endpoint%%","add_to_cart"),o,function(a){a&&(a.error&&a.product_url?window.location=a.product_url:"yes"!==wc_add_to_cart_params.cart_redirect_after_add?t(document.body).trigger("added_to_cart",[a.fragments,a.cart_hash,d]):window.location=wc_add_to_cart_params.cart_url)})}},a.prototype.updateButton=function(a,d,o,r){(r=void 0!==r&&r)&&(r.removeClass("loading"),r.addClass("added"),wc_add_to_cart_params.is_cart||0!==r.parent().find(".added_to_cart").length||r.after(' <a href="'+wc_add_to_cart_params.cart_url+'" class="added_to_cart wc-forward" title="'+wc_add_to_cart_params.i18n_view_cart+'">'+wc_add_to_cart_params.i18n_view_cart+"</a>"),t(document.body).trigger("wc_cart_button_updated",[r]))},a.prototype.updateCartPage=function(){var a=window.location.toString().replace("add-to-cart","added-to-cart");t(".shop_table.cart").load(a+" .shop_table.cart:eq(0) > *",function(){t(".shop_table.cart").stop(!0).css("opacity","1").unblock(),t(document.body).trigger("cart_page_refreshed")}),t(".cart_totals").load(a+" .cart_totals:eq(0) > *",function(){t(".cart_totals").stop(!0).css("opacity","1").unblock(),t(document.body).trigger("cart_totals_refreshed")})},a.prototype.updateFragments=function(a,d){d&&(t.each(d,function(a){t(a).addClass("updating").fadeTo("400","0.6").block({message:null,overlayCSS:{opacity:.6}})}),t.each(d,function(a,d){t(a).replaceWith(d),t(a).stop(!0).css("opacity","1").unblock()}),t(document.body).trigger("wc_fragments_loaded"))},new a});
;window.jQuery(document).ready(function($){$('body').on('adding_to_cart',function(event,$button,data){$button&&$button.hasClass('vc_gitem-link')&&$button.addClass('vc-gitem-add-to-cart-loading-btn').parents('.vc_grid-item-mini').addClass('vc-woocommerce-add-to-cart-loading').append($('<div class="vc_wc-load-add-to-loader-wrapper"><div class="vc_wc-load-add-to-loader"></div></div>'));}).on('added_to_cart',function(event,fragments,cart_hash,$button){if('undefined'===typeof($button)){$button=$('.vc-gitem-add-to-cart-loading-btn');}
$button&&$button.hasClass('vc_gitem-link')&&$button.removeClass('vc-gitem-add-to-cart-loading-btn').parents('.vc_grid-item-mini').removeClass('vc-woocommerce-add-to-cart-loading').find('.vc_wc-load-add-to-loader-wrapper').remove();});});
;"use strict";function css_browser_selector(e,n){var t=document.documentElement,o=[];n=n?n:"",uaInfo.ua=e.toLowerCase();var i=uaInfo.getBrowser();"gecko"==i&&(i=!window.ActiveXObject&&"ActiveXObject"in window?"ie ie11":i);var a=/no-touch/g;a.test(t.className)&&(o=o.concat("no-touch")),o=o.concat(i),o=o.concat(uaInfo.getPlatform()),o=o.concat(uaInfo.getMobile()),o=o.concat(uaInfo.getIpadApp()),o=o.concat(uaInfo.getLang()),o=o.concat(["js"]),o=o.concat(screenInfo.getPixelRatio()),o=o.concat(screenInfo.getInfo());var r=function(){t.className=t.className.replace(/ ?orientation_\w+/g,"").replace(/ [min|max|cl]+[w|h]_\d+/g,""),t.className=t.className+" "+screenInfo.getInfo().join(" ")};window.addEventListener("resize",r),window.addEventListener("orientationchange",r);var s=dataUriInfo.getImg();return s.onload=s.onerror=function(){t.className+=" "+dataUriInfo.checkSupport().join(" ")},o=o.filter(function(e){return e}),o[0]=n?n+o[0]:o[0],t.className=o.join(" "+n),t.className}var uaInfo={ua:"",is:function(e){return RegExp(e,"i").test(uaInfo.ua)},version:function(e,n){n=n.replace(".","_");for(var t=n.indexOf("_"),o="";t>0;)o+=" "+e+n.substring(0,t),t=n.indexOf("_",t+1);return o+=" "+e+n},getBrowser:function(){var e="gecko",n="webkit",t="chrome",o="firefox",i="safari",a="opera",r="android",s="blackberry",c="device_",d=uaInfo.ua,u=uaInfo.is;return[!/opera|webtv/i.test(d)&&/msie\s(\d+)/.test(d)?"ie ie"+(/trident\/4\.0/.test(d)?"8":RegExp.$1):u("firefox/")?e+" "+o+(/firefox\/((\d+)(\.(\d+))(\.\d+)*)/.test(d)?" "+o+RegExp.$2+" "+o+RegExp.$2+"_"+RegExp.$4:""):u("gecko/")?e:u("opera")?a+(/version\/((\d+)(\.(\d+))(\.\d+)*)/.test(d)?" "+a+RegExp.$2+" "+a+RegExp.$2+"_"+RegExp.$4:/opera(\s|\/)(\d+)\.(\d+)/.test(d)?" "+a+RegExp.$2+" "+a+RegExp.$2+"_"+RegExp.$3:""):u("konqueror")?"konqueror":u("blackberry")?s+(/Version\/(\d+)(\.(\d+)+)/i.test(d)?" "+s+RegExp.$1+" "+s+RegExp.$1+RegExp.$2.replace(".","_"):/Blackberry ?(([0-9]+)([a-z]?))[\/|;]/gi.test(d)?" "+s+RegExp.$2+(RegExp.$3?" "+s+RegExp.$2+RegExp.$3:""):""):u("android")?r+(/Version\/(\d+)(\.(\d+))+/i.test(d)?" "+r+RegExp.$1+" "+r+RegExp.$1+RegExp.$2.replace(".","_"):"")+(/Android (.+); (.+) Build/i.test(d)?" "+c+RegExp.$2.replace(/ /g,"_").replace(/-/g,"_"):""):u("chrome")?n+" "+t+(/chrome\/((\d+)(\.(\d+))(\.\d+)*)/.test(d)?" "+t+RegExp.$2+(RegExp.$4>0?" "+t+RegExp.$2+"_"+RegExp.$4:""):""):u("iron")?n+" iron":u("applewebkit/")?n+" "+i+(/version\/((\d+)(\.(\d+))(\.\d+)*)/.test(d)?" "+i+RegExp.$2+" "+i+RegExp.$2+RegExp.$3.replace(".","_"):/ Safari\/(\d+)/i.test(d)?"419"==RegExp.$1||"417"==RegExp.$1||"416"==RegExp.$1||"412"==RegExp.$1?" "+i+"2_0":"312"==RegExp.$1?" "+i+"1_3":"125"==RegExp.$1?" "+i+"1_2":"85"==RegExp.$1?" "+i+"1_0":"":""):u("mozilla/")?e:""]},getPlatform:function(){var e=uaInfo.ua,n=uaInfo.version,t=uaInfo.is;return[t("j2me")?"j2me":t("ipad|ipod|iphone")?(/CPU( iPhone)? OS (\d+[_|\.]\d+([_|\.]\d+)*)/i.test(e)?"ios"+n("ios",RegExp.$2):"")+" "+(/(ip(ad|od|hone))/gi.test(e)?RegExp.$1:""):t("playbook")?"playbook":t("kindle|silk")?"kindle":t("playbook")?"playbook":t("mac")?"mac"+(/mac os x ((\d+)[.|_](\d+))/.test(e)?" mac"+RegExp.$2+" mac"+RegExp.$1.replace(".","_"):""):t("win")?"win"+(t("windows nt 6.2")?" win8":t("windows nt 6.1")?" win7":t("windows nt 6.0")?" vista":t("windows nt 5.2")||t("windows nt 5.1")?" win_xp":t("windows nt 5.0")?" win_2k":t("windows nt 4.0")||t("WinNT4.0")?" win_nt":""):t("freebsd")?"freebsd":t("x11|linux")?"linux":""]},getMobile:function(){var e=uaInfo.is;return[e("android|mobi|mobile|j2me|iphone|ipod|ipad|blackberry|playbook|kindle|silk")?"mobile":""]},getIpadApp:function(){var e=uaInfo.is;return[e("ipad|iphone|ipod")&&!e("safari")?"ipad_app":""]},getLang:function(){var e=uaInfo.ua;return[/[; |\[](([a-z]{2})(\-[a-z]{2})?)[)|;|\]]/i.test(e)?("lang_"+RegExp.$2).replace("-","_")+(""!=RegExp.$3?(" lang_"+RegExp.$1).replace("-","_"):""):""]}},screenInfo={width:(window.outerWidth||document.documentElement.clientWidth)-15,height:window.outerHeight||document.documentElement.clientHeight,screens:[0,768,980,1200],screenSize:function(){screenInfo.width=(window.outerWidth||document.documentElement.clientWidth)-15,screenInfo.height=window.outerHeight||document.documentElement.clientHeight;for(var e=screenInfo.screens,n=e.length,t=[];n--;)if(screenInfo.width>=e[n]){n&&t.push("minw_"+e[n]),2>=n&&t.push("maxw_"+(e[n+1]-1));break}return t},getOrientation:function(){return screenInfo.width<screenInfo.height?["orientation_portrait"]:["orientation_landscape"]},getInfo:function(){var e=[];return e=e.concat(screenInfo.screenSize()),e=e.concat(screenInfo.getOrientation())},getPixelRatio:function(){var e=[],n=window.devicePixelRatio?window.devicePixelRatio:1;return n>1?(e.push("retina_"+parseInt(n)+"x"),e.push("hidpi")):e.push("no-hidpi"),e}},dataUriInfo={data:new Image,div:document.createElement("div"),isIeLessThan9:!1,getImg:function(){return dataUriInfo.data.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",dataUriInfo.div.innerHTML="<!--[if lt IE 9]><i></i><![endif]-->",dataUriInfo.isIeLessThan9=1==dataUriInfo.div.getElementsByTagName("i").length,dataUriInfo.data},checkSupport:function(){return 1!=dataUriInfo.data.width||1!=dataUriInfo.data.height||dataUriInfo.isIeLessThan9?["no-datauri"]:["datauri"]}},css_browser_selector_ns=css_browser_selector_ns||"";css_browser_selector(navigator.userAgent,css_browser_selector_ns),function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,n=navigator.userAgent.toLowerCase().indexOf("opera")>-1,t=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||n||t)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,n=location.hash.substring(1);/^[A-z0-9_-]+$/.test(n)&&(e=document.getElementById(n),e&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus()))},!1)}();try{new CustomEvent("test")}catch(e){var CustomEvent=function(e,n){var t;return n=n||{bubbles:!1,cancelable:!1,detail:void 0},t=document.createEvent("CustomEvent"),t.initCustomEvent(e,n.bubbles,n.cancelable,n.detail),t};CustomEvent.prototype=window.Event.prototype,window.CustomEvent=CustomEvent}Array.prototype.indexOf||(Array.prototype.indexOf=function(e){if(null==this)throw new TypeError;var n,t,o=Object(this),i=o.length>>>0;if(0===i)return-1;if(n=0,arguments.length>1&&(n=Number(arguments[1]),n!=n?n=0:0!=n&&1/0!=n&&n!=-1/0&&(n=(n>0||-1)*Math.floor(Math.abs(n)))),n>=i)return-1;for(t=n>=0?n:Math.max(i-Math.abs(n),0);i>t;t++)if(t in o&&o[t]===e)return t;return-1});var evento=function(e){var n,t,o,i=e,a=i.document,r={};return n=function(){return"function"==typeof a.addEventListener?function(e,n,t){e.addEventListener(n,t,!1),r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n].push(t)}:"function"==typeof a.attachEvent?function(e,n,t){e.attachEvent(n,t),r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n].push(t)}:function(e,n,t){e["on"+n]=t,r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n].push(t)}}(),t=function(){return"function"==typeof a.removeEventListener?function(e,n,t){e.removeEventListener(n,t,!1),Helio.each(r[e][n],function(o){o===t&&(r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n][r[e][n].indexOf(o)]=void 0)})}:"function"==typeof a.detachEvent?function(e,n,t){e.detachEvent(n,t),Helio.each(r[e][n],function(o){o===t&&(r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n][r[e][n].indexOf(o)]=void 0)})}:function(e,n,t){e["on"+n]=void 0,Helio.each(r[e][n],function(o){o===t&&(r[e]=r[e]||{},r[e][n]=r[e][n]||[],r[e][n][r[e][n].indexOf(o)]=void 0)})}}(),o=function(e,n){r[e]=r[e]||{},r[e][n]=r[e][n]||[];for(var t=0,o=r[e][n].length;o>t;t+=1)r[e][n][t]()},{add:n,remove:t,trigger:o,_handlers:r}}(this);!function(e){function n(e){return new RegExp("(^|\\s+)"+e+"(\\s+|$)")}function t(e,n){var t=o(e,n)?a:i;t(e,n)}var o,i,a;"classList"in document.documentElement?(o=function(e,n){return null!==e?e.classList.contains(n):void 0},i=function(e,n){null!==e&&e.classList.add(n)},a=function(e,n){null!==e&&e.classList.remove(n)}):(o=function(e,t){return null!==e?n(t).test(e.className):void 0},i=function(e,n){o(e,n)||null!==e&&(e.className=e.className+" "+n)},a=function(e,t){null!==e&&(e.className=e.className.replace(n(t)," "))});var r={hasClass:o,addClass:i,removeClass:a,toggleClass:t,has:o,add:i,remove:a,toggle:t};"function"==typeof define&&define.amd?define(r):e.classie=r}(window),function(e,n){var t=new CustomEvent("boxResized"),o=classie.hasClass(document.documentElement,"touch")?!0:!1,i=(classie.hasClass(document.documentElement,"ie")||classie.hasClass(document.documentElement,"opera12")?!0:!1,e.document.createEvent("UIEvents"));i.initUIEvent("resize",!0,!1,e,0),e.onload=function(){o||setTimeout(function(){e.dispatchEvent(a.boxEvent),e.dispatchEvent(a.resizeEvent),Waypoint.refreshAll()},2e3),jQuery(e).trigger("resize")},e.addEventListener("resize",function(){e.dispatchEvent(t)});var a={boxEvent:t,resizeEvent:i,isMobile:o};"function"==typeof define&&define.amd?define(a):e.ZOZO=a}(window);