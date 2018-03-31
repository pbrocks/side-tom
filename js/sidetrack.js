///////////////////////////////
// Set Variables
///////////////////////////////

var gridContainer = jQuery('.thumbs');
var colW;
var gridGutter = 0;
var catptionOffset = -20;
var OS;
var widgetsRelocated = false;

///////////////////////////////
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

///////////////////////////////
// Project Filtering
///////////////////////////////

function projectFilterInit() {
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');
		jQuery('#projects .thumbs').isotope({
			filter: selector,
			hiddenStyle : {
		    	opacity: 0,
		    	scale : 1
			}
		});

		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}

		return false;
	});
}


///////////////////////////////
// Project thumbs
///////////////////////////////

function projectThumbInit() {
	setColumns();
	gridContainer.isotope({
		resizable: false,
		layoutMode: 'fitRows',
		masonry: {
			columnWidth: colW
		}
	});

	jQuery(".thumbs .small").css("visibility", "visible");
}

///////////////////////////////
// Isotope Grid Resize
///////////////////////////////

function setColumns()
{
	var columns;
	var gw = gridContainer.width();
	if(gw<=1400){
		columns = 2;
	}else if(gw<=1700){
			columns = 3;
	}else{
		columns = 4;
	}
	colW = Math.floor(gw / columns);
	jQuery('.thumbs .small').each(function(id){
		jQuery(this).css('width',colW+'px');
	});
	jQuery('.thumbs .small').show();
}

function gridResize() {
	setColumns();
	gridContainer.isotope({
		resizable: false,
		layoutMode: 'fitRows',
		masonry: {
			columnWidth: colW
		}
	});
}

///////////////////////////////
// Set Home Slideshow Height
///////////////////////////////

function setHomeSlideshowHeight() {
	var windowHeight = jQuery(window).height();
	jQuery('.home .slideshow .slide').height(windowHeight);
}

///////////////////////////////
// Center Slideshow Content
///////////////////////////////

function centerSlideContent() {
	var offset = 40;
	jQuery('body.home #content .slide .details').each(function(id){
		jQuery(this).css('margin-top','-'+((jQuery(this).actual('height')/2)+offset)+'px');
		jQuery(this).show();
	});
}

///////////////////////////////
// Home Slideshow Nav
///////////////////////////////

function initSlideshowNav(){
	jQuery('#slideshowNav a').click(function(e) {
		jQuery('html, body').animate({scrollTop:jQuery(jQuery(this).attr('href')).offset().top}, 1000);
		e.preventDefault();
	});
}

function slideshowScroll() {
	var activeBtn = activeSlideshowBtn();
	if (!activeBtn.hasClass('active')) {
		jQuery('#slideshowNav a').removeClass('active');
		activeBtn.addClass('active');
	}
}

function activeSlideshowBtn() {
	var scrollPos = jQuery(window).scrollTop();
	var activeBtn = null;
	jQuery('#slideshowNav a').each(function() {
			var navItem = jQuery(this);
			var id = navItem.attr('id').replace( /^\D+/g, '');

			var currentSlide = jQuery('#slide'+id);
			if (scrollPos + (jQuery(window).height() / 2) > currentSlide.offset().top) {
				activeBtn = navItem;
			} else {
				return activeBtn;
			}
		}
	);
	return activeBtn;
}

///////////////////////////////////
// Relocate Elements
///////////////////////////////////

function relocateElements()
{
	if(jQuery(window).width() <= 1024 && !widgetsRelocated) {
		jQuery('#sidebar').insertAfter(jQuery('#mobileNav .mainNav'));
		widgetsRelocated = true;
	}
	else if(jQuery(window).width() > 1024 && widgetsRelocated) {
		widgetsRelocated = false;
		jQuery('#sidebar').insertAfter(jQuery('#header #mainNav'));
		jQuery.pageslide.close();
	}
}

///////////////////////////////
// Mobile Submenu Nav
///////////////////////////////

function mobileCollapse(){
	var $collapseMenu = jQuery(document.getElementsByClassName('mainNav')),
		$collapseLi = $collapseMenu.find('li'),
		$collapseA = jQuery('.menu-item-has-children a');

	$collapseMenu.find( "li.menu-item-has-children" ).click( function(){

		$collapseLi.not( this ).find( "ul" ).next().slideToggle( 100 );
		jQuery( this ).find( "> ul" ).stop( true, true ).slideToggle( 100 );
		jQuery( this ).toggleClass( "active-sub-menu" );

		return false;

	});

	// Don't fire sub menu toggle if a user is trying to click the link
	$collapseA.click( function(e) {

		e.stopPropagation();

		return true;
	});
}

///////////////////////////////
// Initialize
///////////////////////////////

jQuery.noConflict();
jQuery(document).ready(function(){
	jQuery("#content").fitVids();
	//Stuff that happens after images are loaded
	jQuery('#container').waitForImages(function(){
		setHomeSlideshowHeight();
		projectThumbInit();
		projectFilterInit();
		jQuery('.home #container').css('opacity', '1' );
		initSlideshowNav();
	});

	//Set mobile nav
	jQuery(".menuToggle").pageslide({ direction: "left"});


	jQuery(window).smartresize(function(){
		gridResize();
		setHomeSlideshowHeight();
		relocateElements();
	});

	if(jQuery('body').hasClass('home')) {
		jQuery(window).scroll(slideshowScroll);
	}

	relocateElements();
	jQuery('img').attr('title','');

	mobileCollapse();

});