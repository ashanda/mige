
/*********************************************************************************************************/
/* -------------------------------------- Home part - 100% hight ------------------------------------------ */
/*********************************************************************************************************/
$(document).ready(function() {
	
	jQuery.fn.refresh = function() {
		var s = skrollr.get();
	
		if (s) {
			s.refresh(this);
		}
		return this;
	};
	
	function fullHeight() {
		//Home image height
		windowHeight = $(window).height();
		$('.home').css('height', windowHeight).refresh();
		
		//Menu height
		headerHeight = $('#header').outerHeight();
		$('.menu').css('height', windowHeight - headerHeight).refresh();
	};
	
	fullHeight();
	
	$(window).resize(function() {
		fullHeight();
	});
	
});