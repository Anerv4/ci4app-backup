(function ($) {
	
	"use strict";

	// Page loading animation
	$(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });

	// WOW JS
	$(window).on ('load', function (){
        if ($(".wow").length) { 
            var wow = new WOW ({
                boxClass:     'wow',      // Animated element css class (default is wow)
                animateClass: 'animated', // Animation css class (default is animated)
                offset:       20,         // Distance to the element when triggering the animation (default is 0)
                mobile:       true,       // Trigger animations on mobile devices (default is true)
                live:         true,       // Act on asynchronously loaded content (default is true)
            });
            wow.init();
        }
    });

	// $(window).scroll(function() {
	//   var scroll = $(window).scrollTop();
	//   var box = $('.header-text').height();
	//   var header = $('header').height();

	//   if (scroll >= box - header) {
	//     $("header").addClass("background-header");
	//   } else {
	//     $("header").removeClass("background-header");
	//   }
	// }); 
	//Code Lama Yang ada Bug Pada Navbar nya ada diatas

	/** 
	 * Jadi Biar Saya Jelaskan Mengenai Apa Yang Terjadi Penyebab Hilangnya Navbar Di luar controller index yang awalnya saya pikir begitu tapi ternyata tidak ada hubungannya sama sekali dengan controllernya
	 * Masalah sesungguhnya terletak pada JavaScriptnya Setelah Saya bertanya kepada teman saya yang ahli dalam bidang javascript dia menetahui bahwasannya ada yang salah dalam penulisan code saya sehingga hasil dari code tersebut NULL atai tidak ada nilai
	 * Penjelasan:
	 * Itu semua disebabkan karena di var box itu dicari class ".header-text" namun dalam pengimpelementasian website saya lebih tepatnya di controller pages method about saya tidak menuliskan div class header-text sehingga header-text yang seharusnya dicari ber value null, makanya kode nya tidak jalan (navbar saya hilang setelah di scroll kebawah) karena var box bervalue null karena di html saya tidak ada class header-text
	 * Penjelasan Maslah By Arjuna:
	 * "Soale alasannya navbarmu ngga balik itu gegara ada class background-header yang ditambahin kalau scrollnya lebih dari box sampai header (box-header),jadinya si if ke trigger tapi pas scrollnya kamu naikin lagi itu ngga ke remove karena returnnya masih true(di if nya) ,jadinya if yang jalan terus ,jadi kesimpulannya:'Tiap kamu scroll itu yang jalan addClass.("background-header") dan pas kamu balik keatas itu ngga bakal balik karena yang harusnya removeClass("background-header") ngga jalan karena yang jalan itu addClassnya'"
	 * 
	 * Solusi:
	 * Kamu bisa hapus var boxnya lalu di if nya tulis seperti ini
	 * if (scroll >= header){
	 *  $("header").addClass("background-header");
	 * }else{
	 *  $("header").removeClass("background-header");
	 * }
	 * 
	 * tapi juga bisa tidak dihapus var box nya siapa tau butuh,tinggal cantumkan saja class header-text nya jangan lupa kalo gak gitu bisa bisa navbar mu akan hilang setiap kali di scroll kebawah
	 */

	$(window).scroll(function() {
	  var scroll = $(window).scrollTop();
	  var header = $('header').height();

	  if (scroll >= header) {
	    $("header").addClass("background-header");
	  } else {
	    $("header").removeClass("background-header");
	  }
	});
	
	$('.filters ul li').click(function(){
        $('.filters ul li').removeClass('active');
        $(this).addClass('active');
          
          var data = $(this).attr('data-filter');
          $grid.isotope({
            filter: data
          })
        });

        var $grid = $(".grid").isotope({
          	itemSelector: ".all",
          	percentPosition: true,
          	masonry: {
            columnWidth: ".all"
        }
    })

	var width = $(window).width();
		$(window).resize(function() {
			if (width > 992 && $(window).width() < 992) {
				location.reload();
			}
			else if (width < 992 && $(window).width() > 992) {
				location.reload();
			}
	})



	$(document).on("click", ".naccs .menu div", function() {
		var numberIndex = $(this).index();
	
		if (!$(this).is("active")) {
			$(".naccs .menu div").removeClass("active");
			$(".naccs ul li").removeClass("active");
	
			$(this).addClass("active");
			$(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");
	
			var listItemHeight = $(".naccs ul")
				.find("li:eq(" + numberIndex + ")")
				.innerHeight();
			$(".naccs ul").height(listItemHeight + "px");
		}
	});

	$('.owl-features').owlCarousel({
		items:3,
		loop:true,
		dots: false,
		nav: true,
		autoplay: true,
		margin:30,
		responsive:{
			  0:{
				  items:1
			  },
			  600:{
				  items:2
			  },
			  1200:{
				  items:3
			  },
			  1800:{
				items:3
			}
		}
	})

	$('.owl-collection').owlCarousel({
		items:3,
		loop:true,
		dots: false,
		nav: true,
		autoplay: true,
		margin:30,
		responsive:{
			  0:{
				  items:1
			  },
			  800:{
				  items:2
			  },
			  1000:{
				  items:3
			}
		}
	})

	$('.owl-banner').owlCarousel({
		items:1,
		loop:true,
		dots: false,
		nav: true,
		autoplay: true,
		margin:30,
		responsive:{
			  0:{
				  items:1
			  },
			  600:{
				  items:1
			  },
			  1000:{
				  items:1
			}
		}
	})

	
	
	

	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	// Menu elevator animation
	$('.scroll-to-section a[href*=\\#]:not([href=\\#])').on('click', function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				var width = $(window).width();
				if(width < 991) {
					$('.menu-trigger').removeClass('active');
					$('.header-area .nav').slideUp(200);	
				}				
				$('html,body').animate({
					scrollTop: (target.offset().top) - 80
				}, 700);
				return false;
				// console.log(target);
			}
		}
	});

	$(document).ready(function () {
	    $(document).on("scroll", onScroll);

		//penambahan fitur active untuk setiap navbar yang di klik
	    var link = $(location).attr('href').replace("http://localhost:8080", '')
		console.log(link)
		$(".navbar-item").removeClass("active")
		if (link === '/') {
			$("#home").addClass("active")
		}else if(link === '/pages/about'){
			$("#about").addClass("active")
		}else if(link === '/komik' || link === '/pages/populer' || link === '/komik/create'|| link === '/pages/create'){
			$("#dropdown").addClass("active")
		}
		// else if(link === '/komik'){
		// 	$("#daftarKomik").addClass("active")
		// }else if(link === '/pages/populer'){
		// 	$("#daftarKomikPopuler").addClass("active")
		// }

	    //smoothscroll
	    $('.scroll-to-section a[href^="#"]').on('click', function (e) {
	        e.preventDefault();
	        $(document).off("scroll");
	        
	        $('.scroll-to-section a').each(function () {
	            $(this).removeClass('active');
	        })
	        $(this).addClass('active');
	      
	        var target = this.hash,
	        menu = target;
	       	var target = $(this.hash);
	        $('html, body').stop().animate({
	            scrollTop: (target.offset().top) - 79
	        }, 500, 'swing', function () {
	            window.location.hash = target;
	            $(document).on("scroll", onScroll);
	        });
	    });
	});

	function onScroll(event){
	    var scrollPos = $(document).scrollTop();
	    $('.nav a').each(function () {
	        var currLink = $(this);
	        var refElement = $(currLink.attr("href"));
	        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
	            $('.nav ul li a').removeClass("active");
	            currLink.addClass("active");
	        }
	        else{
	            currLink.removeClass("active");
	        }
			console.log(scrollPos)
	    });
	}


	// Page loading animation
	$(window).on('load', function() {
		if($('.cover').length){
			$('.cover').parallax({
				imageSrc: $('.cover').data('image'),
				zIndex: '1'
			});
		}

		$("#preloader").animate({
			'opacity': '0'
		}, 600, function(){
			setTimeout(function(){
				$("#preloader").css("visibility", "hidden").fadeOut();
			}, 300);
		});
	});

	

	const dropdownOpener = $('.main-nav ul.nav .has-sub > a');

    // Open/Close Submenus
    if (dropdownOpener.length) {
        dropdownOpener.each(function () {
            var _this = $(this);

            _this.on('tap click', function (e) {
                var thisItemParent = _this.parent('li'),
                    thisItemParentSiblingsWithDrop = thisItemParent.siblings('.has-sub');

                if (thisItemParent.hasClass('has-sub')) {
                    var submenu = thisItemParent.find('> ul.sub-menu');

                    if (submenu.is(':visible')) {
                        submenu.slideUp(450, 'easeInOutQuad');
                        thisItemParent.removeClass('is-open-sub');
                    } else {
                        thisItemParent.addClass('is-open-sub');

                        if (thisItemParentSiblingsWithDrop.length === 0) {
                            thisItemParent.find('.sub-menu').slideUp(400, 'easeInOutQuad', function () {
                                submenu.slideDown(250, 'easeInOutQuad');
                            });
                        } else {
                            thisItemParent.siblings().removeClass('is-open-sub').find('.sub-menu').slideUp(250, 'easeInOutQuad', function () {
                                submenu.slideDown(250, 'easeInOutQuad');
                            });
                        }
                    }
                }

                e.preventDefault();
            });
        });
    }
	// genre dropdown nyoba(1)
	// var checkList = document.getElementById('list1');
	// checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
	//   if (checkList.classList.contains('visible'))
	// 	checkList.classList.remove('visible');
	//   else
	// 	checkList.classList.add('visible');
	// }
	

	
	


})(window.jQuery);