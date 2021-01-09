(function($) {
	$('.see-all').on('click', function() {
		$('.filter-option.category').each(function() {
			$(this).prop('checked',false);
		})
	});
	$('.filter-option.category').on('click', function() {
		$('.see-all').prop('checked',false);
	});
	
	// Adds and removes body class depending on screen width.
	function screenClass() {
		if($(window).innerWidth() < 767) {
			$('#multiCollapsefilter').removeClass('show');
			$('#multiCollapseSort').removeClass('show');
		} else {
			$('#multiCollapsefilter').addClass('show');
			$('#multiCollapseSort').addClass('show');
		}
	}
	// Fire.
	screenClass();
	// And recheck when window gets resized.
	$(window).bind('resize',function(){
		screenClass();
	});
	
})(jQuery);