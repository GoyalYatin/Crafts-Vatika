/* Drop down code */
$('.classesmenu li').mouseenter(function(){
	$(this).find('.header-submenu-wrap').stop(true, true).slideDown();	
	var x=$('.classesmenu').width();
	$('.header-submenu-wrap').css('width',x);
	$(this).css('background','#fff');
})
$('.classesmenu li').mouseleave(function(){	
	$(this).find('.header-submenu-wrap').stop(true, true).hide();
	$(this).css('background','none');
});
$('#city').click(function(){
	$('.citydropdown').stop(true, true).toggle();
});
$('body').click(function(evt){
	if(evt.target.id == "city")
        return;
	$('.citydropdown').stop(true, true).hide();
});