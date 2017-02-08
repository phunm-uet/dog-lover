( function( $ ) {

	$( function() {

		"use strict";

		/*-----------------------------------------------------------------------------------*/
		/*  Superfish Menu
		/*-----------------------------------------------------------------------------------*/
		var example = $('ul.sf-menu').superfish({
			delay:       100,
			speed:       'fast',
			autoArrows:  false
		});

		/*-----------------------------------------------------------------------------------*/
		/*  Scroll Top
		/*-----------------------------------------------------------------------------------*/
		$("a[href='#top']").click(function() {
		  $("html, body").animate({ scrollTop: 0 }, "slow");
		  return false;
		});

		/*-----------------------------------------------------------------------------------*/
		/*  Slick Nav
		/*-----------------------------------------------------------------------------------*/
		$('#primary-menu').slicknav({
			prependTo:'#primary-bar',
			label: "Menu"
		});
		$('#secondary-menu').slicknav({
			prependTo:'#secondary-bar',
			label: "Browse"
		});

		/*-----------------------------------------------------------------------------------*/
		/*  Fitvids
		/*-----------------------------------------------------------------------------------*/
		$(".hentry, .widget").fitVids();

		/*-----------------------------------------------------------------------------------*/
		/*  Clipboard
		/*-----------------------------------------------------------------------------------*/
		var clipboard = new Clipboard('.coupon-code');

		clipboard.on('success', function(e) {
			console.info('Action:', e.action);
			console.info('Text:', e.text);
			console.info('Trigger:', e.trigger);

			e.clearSelection();
		});

		clipboard.on('error', function(e) {
			console.error('Action:', e.action);
			console.error('Trigger:', e.trigger);
		});

		/*-----------------------------------------------------------------------------------*/
		/*  Tabs Widget
		/*-----------------------------------------------------------------------------------*/
		var $tabsNav    = $('.tabs-nav'),
			$tabsNavLis = $tabsNav.children('li'),
			$tabContent = $('.tab-content');

		$tabsNav.each(function() {
			var $this = $(this);

			$this.next().children('.tab-content').stop(true,true).hide()
												 .first().show();

			$this.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
				 .addClass('active');

			$this.parent().next().children('.tab-content').stop(true,true).hide()
														  .siblings( $this.find('a').attr('href') ).fadeIn();

			e.preventDefault();
		});

		/*-----------------------------------------------------------------------------------*/
		/*  Image gallery
		/*-----------------------------------------------------------------------------------*/
		$( '.gallery-format' ).owlCarousel( {
			navigation: true, // Show next and prev buttons
			navigationText: [ '<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>' ],
			pagination: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: true
		} );

	} );

}( jQuery ) );


