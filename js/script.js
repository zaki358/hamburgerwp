jQuery(function ($) {
	$(".js-menu--open").on("click", function () {
		//$( this ).toggleClass( "is-open" );
		$(".p-menu").addClass("is-open");
		$("body").addClass("is-open");
		$(".c-layer--sidebar").addClass("is-open");

	});
	$(".js-menu--close").on("click", function () {
		$(".p-menu").removeClass("is-open");
		$("body").removeClass("is-open");
		$(".c-layer--sidebar").removeClass("is-open");
	});

	$(window).on('load resize', function () {
		let commentHeight = $(".p-map__comment").outerHeight();
		let titleHeight = $(".c-title--map").outerHeight();
		let borderHeight = $(".c-title--map__border--white").outerHeight();
		let allHeight = commentHeight + titleHeight + borderHeight;
		if (window.matchMedia('(min-width:1025px)').matches) {
			allHeight = 165 + allHeight;
			$(".p-map").css('height', allHeight);
		} else if (window.matchMedia('(min-width:600px)').matches) {
			allHeight = 80 + allHeight;
			$(".p-map").css('height', allHeight);
		} else {
			allHeight = 80 + allHeight;
			$(".p-map").css('height', allHeight);
		}
		console.log(commentHeight);
		console.log(titleHeight);
		console.log(borderHeight);
		console.log(allHeight);
	});
});