$(document).ready(function() {
	$('.more-msg-info').click(function() {
		if($("#show-more-info-msg").is(":visible")) {
			$("#show-more-info-msg").fadeOut();
		} else {
			$("#show-more-info-msg").fadeIn();
		}
		
	});
});