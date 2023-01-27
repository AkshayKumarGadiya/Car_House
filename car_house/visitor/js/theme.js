/*------------------------------------------------------------------
[Table of contents]

- Author:  Andrey Sokoltsov
- Profile:	http://themeforest.net/user/andreysokoltsov
--*/

(function() {

	"use strict";

	var Core = {

		initialized: false,

		initialize: function() {

			if (this.initialized) return;
			this.initialized = true;

			this.build();

		},

		build: function() {

			//Placeholder for IE
			$('input, textarea').placeholder();
			
			// Dropdown menu
			this.dropdownhover();
			
			// Page preloader
			this.initPagePreloader();
			
			// Equal Height
			this.setEqualHeight();
			
			// Slider
			this.initSlider();
			
			//Setup WOW.js
			this.initScrollAnimations();

			// Owl Carousel
			this.initOwlCarousel();
			
			// bxSlider
			this.initBxSlider();
			
			// Tabs
			this.initTabs();
			
			// Collapse Blocks
			this.initCollapsible();
			
			// Counter
			this.initNumberCounter();
			
			// Go to top
			this.initGoToTop();
			
			
		},

		dropdownhover: function(options) {
			/** Extra script for smoother navigation effect **/
			if ($(window).width() > 798) {
				$('.navbar-main-slide').on('mouseenter', '.navbar-nav-menu > .dropdown', function() {
					"use strict";
					$(this).addClass('open');
				}).on('mouseleave', '.navbar-nav-menu > .dropdown', function() {
					"use strict";
					$(this).removeClass('open');
				});
			}
		},

		initPagePreloader: function(options) {
			var $preloader = $('#page-preloader'),
			$spinner = $preloader.find('.spinner-loader');
			$spinner.fadeOut();
			$preloader.delay(500).fadeOut('slow');
			window.scrollTo( 0, 0 );
		},

		setEqualHeight: function(){
			var equalHeight = $('body').data('equal-height');
			if(equalHeight && equalHeight.length){
				var columns = $(equalHeight);
				var tallestcolumn = 0;
				columns.each(
					function(){
						var currentHeight = $(this).height();
						if(currentHeight > tallestcolumn){
							tallestcolumn = currentHeight;
						}
					}
				);
				columns.height(tallestcolumn);
			}
		},

		initSlider: function(options){
			$(".slider").each(function(i) {
				var $slider = $(this),
					isSlider = $slider.length;

				if(isSlider){
					var minVal = $slider.data('min-val') ? $slider.data('min-val') : 100,
						maxVal = $slider.data('max-val') ? $slider.data('max-val') : 1000;

			        $slider.slider({
			            min: minVal,
			            max: maxVal,
			            values: [minVal,maxVal],
			            range: true,
			            slide: function(event, ui){
		            		$(this).find('span.min').text(ui.values[0]);
		            		$(this).find('span.max').text(ui.values[1]);
			            },
			            stop:function(event, ui){
		            		$(this).parent('div').find('input.j-min').text(ui.values[0]);
		            		$(this).parent('div').find('input.j-max').text(ui.values[1]);
			            }
			        });
			        $(".ui-slider-handle:first-of-type").append("<span class='min'>" + minVal + "</span>");
			        $(".ui-slider-handle:last-of-type").append("<span class='max'>" + maxVal + "</span>");
				}
			});
		},

		initScrollAnimations: function(options) {
			var scrollingAnimations = $('body').data("scrolling-animations");
			if(scrollingAnimations){
				new WOW().init();
			}
		},
		
		initOwlCarousel: function(options) {
			$(".enable-owl-carousel").each(function(i) {
				var $owl = $(this);
				
				var itemsData = $owl.data('items');
				var autoPlayData = $owl.data('auto-play');
				var navigationData = $owl.data('navigation');
				var stopOnHoverData = $owl.data('stop-on-hover');
				var itemsDesktopData = $owl.data('items-desktop');
				var itemsDesktopSmallData = $owl.data('items-desktop-small');
				var itemsTabletData = $owl.data('items-tablet');
				var itemsTabletSmallData = $owl.data('items-tablet-small');
				
				$owl.owlCarousel({
					items: itemsData,
					pagination: false,
					navigation: navigationData,
					autoPlay: autoPlayData,
					stopOnHover: stopOnHoverData,
					navigationText: ["",""],
					itemsCustom:[
						[0, 1],
						[500, itemsTabletSmallData],
						[710, itemsTabletData],
						[992, itemsDesktopSmallData],
						[1199, itemsDesktopData]
					],
				});
			});
		},
		
		initBxSlider: function(options) {
			$(".enable-bx-slider").each(function(i) {
				var $bx = $(this);
				var pagerCustomData = $bx.data('pager-custom');
				var modeData = $bx.data('mode');
				var pagerSlideData = $bx.data('pager-slide');
				var modePagerData = $bx.data('mode-pager');
				var pagerQtyData = $bx.data('pager-qty');
				
				
				var realSlider = $bx.bxSlider({
					pagerCustom: pagerCustomData,
					mode: modeData,
				});
				if(pagerSlideData){
					var realThumbSlider=$(pagerCustomData).bxSlider({
						mode: modePagerData,
						minSlides: pagerQtyData,
						maxSlides: pagerQtyData,
						moveSlides: 1,
						slideMargin: 20,
						pager:false,
						infiniteLoop:false,
						hideControlOnEnd:true,
						nextText:'<span class="fa fa-angle-down"></span>',
						prevText:'<span class="fa fa-angle-up"></span>'
					});
					linkRealSliders(realSlider,realThumbSlider,pagerCustomData);
					if($(pagerCustomData+" a").length <= pagerQtyData ){
						$(pagerCustomData+" .bx-next").hide();
					}
				}
			});
			function linkRealSliders(bigS,thumbS,sliderId){
				$(sliderId).on("click","a",function(event){
					event.preventDefault();
					var newIndex=$(this).data("slide-index");
					bigS.goToSlide(newIndex);
				});
			}
		},
		
		initTabs: function(options) {
			$(document).on('click', '.j-tab', function(e){
				var to = $($(this).attr('data-to'));
				if(to.length > 0){
					if(to.css('display') == 'none'){
						var tabs = to.parent().find('.j-tab');
						if(tabs.length > 0){
							tabs.each(function(i,e){
								if($(e).hasClass('m-active')){
									$(e).removeClass('s-lineDownCenter');
									$(e).removeClass('m-active');                        
								}
								var to2 = $($(e).attr('data-to'));
								if(to2.css('display') == 'block')
									to2.css('display','none');
							});
						}
						to.css('display','block');
						if(!(($(this).hasClass('owl-next')) || ($(this).hasClass('owl-prev'))))
							$(this).addClass('m-active s-lineDownCenter');
						else{
							$('.b-auto__main-toggle').each(function(i,e){
								if($(e).attr('data-to').replace('#','') == to.attr('id')){
									$(e).addClass('m-active s-lineDownCenter');
								}
							})
						}      
					}
				}
				e.preventDefault();
			});
		},
		
		initCollapsible: function(options) {
			var collapse = $('.j-more').length;
			if(collapse){
				$(document).on('click', '.j-more', function(e){
					var inside = $(this).parent().parent().find('.j-inside');
					var span = $(this).find('span.fa');
					if(inside.length > 0){
						span.toggleClass('fa-angle-left');
						span.toggleClass('fa-angle-down');
						$(this).parent().toggleClass('m-active');
						inside.toggleClass('m-active');
					}
					e.preventDefault();
				});
			}
		},
		
		initNumberCounter: function(options) {
			if ($('body').length) {
				var waypointScroll = $('.percent-blocks').data('waypoint-scroll');
				if(waypointScroll){
					$(window).on('scroll', function() {
						var winH = $(window).scrollTop();
						$('.percent-blocks').waypoint(function() {
							$('.chart').each(function() {
								CharsStart();
							});
						}, {
							offset: '80%'
						});
					});
				}
			}
			function CharsStart() {
				$('.chart').easyPieChart({
					barColor: false,
					trackColor: false,
					scaleColor: false,
					scaleLength: false,
					lineCap: false,
					lineWidth: false,
					size: false,
					animate: 3000,
					onStep: function(from, to, percent){
						$(this.el).find('.percent').text(Math.round(percent));
					}
				});
			}
		},

		initGoToTop: function(options) {
			// Show/Hide Button on Window Scroll event.
			$(window).on('scroll', function(){
				var fromTop = $(this).scrollTop();
				var display = 'none';
				if(fromTop > 650){
					display = 'block';
				}
				$('#to-top').css({'display': display});
			});
			$("#to-top").smoothScroll();
		},
	};

	Core.initialize();

})();