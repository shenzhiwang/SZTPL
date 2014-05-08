$(document).ready(function () {

    $('.an').hover(
		function () { t = setTimeout(function () { $('.nav-item-1').addClass('ni1-bg');$('.nl').slideDown(50); }, 70); },
		function () { clearTimeout(t); $('.nl').slideUp(150,function(){$('.nav-item-1').removeClass('ni1-bg');}); }
	);

    /* 顶部菜单 */
    $('.dm').hover(
		function () { var e = $(this);t = setTimeout(function () { e.find('.menu').stop().slideDown(50); }, 70); $(this).find('.item-link').addClass('dm_hover'); },
		function () {  clearTimeout(t);$(this).find('.menu').stop().slideUp(150); $(this).find('.item-link').removeClass('dm_hover'); }
	);
    /* 设置菜单 */
	$(".item-link-5").click(function(e){
		e.stopPropagation();
		var o = $(this);
		o.addClass('il5-bg');
		$(".view_setting").slideToggle(50,function(){ 
			if( $(".view_setting").is(":hidden") ){ o.removeClass('il5-bg'); } 
		});
	});
		
	$(document).click(function(){
		$(".view_setting").slideUp(300,function(){$('.item-link-5').removeClass('il5-bg');});
	});
	
	$(".view_setting").click(function(e){e.stopPropagation();});

});/* jQuery Document End */


