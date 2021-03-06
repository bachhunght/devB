// generic JS fixes

// various JavaScript object.
var Blueprint = {};

// jump to the value in a select drop down
Blueprint.go = function(e) {
  var destination = e.options[e.selectedIndex].value;
  if (destination && destination != 0) location.href = destination;
};

// prevent users from clicking a submit button twice
Blueprint.formCheck = function() {
  // only apply this to node and comment and new user registration forms
  var forms = $("#node-form>div>div>#edit-submit,#comment-form>div>#edit-submit,#user-register>div>#edit-submit");

  // insert the saving div now to cache it for better performance and to show the loading image
  $('<div id="saving"><p class="saving">Saving&hellip;</p></div>').insertAfter(forms);

  forms.click(function() {
    $(this).siblings("input:submit").hide();
    $(this).hide();
    $("#saving").show();

    var notice = function() {
      $('<p id="saving-notice">Not saving? Wait a few seconds, reload this page, and try again. Every now and then the internet hiccups too :-)</p>').appendTo("#saving").fadeIn();
    };

    // append notice if form saving isn't work, perhaps a timeout issue
    setTimeout(notice, 24000);
  });
};

// Global Killswitch.
if (Drupal.jsEnabled) {
  $(document).ready(Blueprint.formCheck);
}

jQuery.preloadImages = function()
{
  for(var i = 0; i<arguments.length; i++)
  {
  jQuery("<img>").attr("src", arguments[i]);
  }
};

$.preloadImages("/sites/all/themes/images/buttons/home-over.png" ,
"/sites/all/themes/blueprint/images/buttons/about-over.png",
"/sites/all/themes/blueprint/images/buttons/the-oil-over.png",
"/sites/all/themes/blueprint/images/buttons/recipes-over.png",
"/sites/all/themes/blueprint/images/buttons/links-over.png",
"/sites/all/themes/blueprint/images/buttons/contact-over.png");


$(document).ready( function() {

$("#home img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/home-over.png"); });
$("#home img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/home.png"); });
$("#about img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/about-over.png"); });
$("#about img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/about.png"); });
$("#the-oil img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/the-oil-over.png"); });
$("#the-oil img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/the-oil.png)"; });
$("#recipes img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/recipes-over.png"); });
$("#recipes img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/recipes.png"); });
$("#links img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/links-over.png"); });
$("#links img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/links-over.png"); });
$("#contact img").bind("mouseover", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/contact-over.png"); });
$("#contact img").bind("mouseout", function() { $(this).attr("src", "/sites/all/themes/blueprint/images/buttons/contact.png"); });

});