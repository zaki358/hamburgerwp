jQuery(function ($) {
	//Menuボタンをクリックで各要素にis-openクラスを付与
	$(".js-menu--open").on("click", function () {
		$(".p-menu").addClass("is-open");
		$("body").addClass("is-open");
		$(".c-layer--sidebar").addClass("is-open");
	});

	//クローズボタン（×ボタン）をクリックでis-openクラスを削除
	$(".js-menu--close").on("click", function () {
		$(".p-menu").removeClass("is-open");
		$("body").removeClass("is-open");
		$(".c-layer--sidebar").removeClass("is-open");
	});

	//フロントページのマップ、文字数に合わせて高か変更
	//コメント、タイトル、線の部分の高さを取得して変数に置き換え
	$(window).on('load resize', function () {
		let commentHeight = $(".p-map__comment").outerHeight();
		let titleHeight = $(".c-title--map").outerHeight();
		let borderHeight = $(".c-title--map__border--white").outerHeight();
		let allHeight = commentHeight + titleHeight + borderHeight;
		if (window.matchMedia('(min-width:1025px)').matches) {
			let margin = 165;
			allHeight = margin + allHeight;
			$(".p-map").css('height', allHeight);
		} else if (window.matchMedia('(min-width:600px)').matches) {
			let margin = 80;
			allHeight = margin + allHeight;
			$(".p-map").css('height', allHeight);
		} else {
			let margin = 80;
			allHeight = margin + allHeight;
			$(".p-map").css('height', allHeight);
		}
	});
});