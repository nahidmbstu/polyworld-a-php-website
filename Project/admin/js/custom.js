$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});


$(document).ready(function()
{
	$('#nav li').hover(function()
	{
		$('ul', this).slideDown('fast');
	}, function()
	{
		$('ul', this).slideUp('fast');
	});
});







