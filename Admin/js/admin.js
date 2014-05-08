$(document).ready(function() {



	$('.top_menu a').mousemove(function(obj){
		var textid = $(this).next().text();  //获取当前元素的下一个元素的值（里面是存放对象关联的左侧当好 class 值）
	});

	//主导航点击事件
	$('.top_menu a').click(function() {
		$('.top_menu a').removeClass('bg');
		$(this).addClass('bg');
		var text = $(this).text();
		$('.favorite_menu').html('<span> 当前位置：'+text+'</span>');
		$('.subm').hide();//隐藏左侧点击缓存

		//获取当前对象的下一个元素的值（值是对应的这个元素下的内容）
		var textid = $(this).next().text();  //获取当前元素的下一个元素的值（里面是存放对象关联的左侧当好 class 值）
		//alert(textid);
		$('.left_m').css('display', 'none');  //先将左侧当好下的所有 ul 都隐藏
		$('#'+textid).css('display', 'block');  //开启当前对象下关联的左侧导航

		$('.top_content').html('<iframe src="welcome.html" nid="0" scrolling="auto" frameborder="0" style="height: 100%;width: 100%;"></iframe>');  //改变页面内容区域的地址

	});
	
	//左侧导航点击事件
	$('.left_m a').click(function() {
		$('.left_m a').removeClass('action');
		$(this).addClass('action');
		
		var url = $(this).next().text()+'.html';  //获取元素的url地址
		var cating = $(this).text();  //获取当前栏目的名称
		var pcat = $(this).parent().parent().find('dt').text();//获取当前栏目的父级栏目

		$('.top_content').html('<iframe src="'+url+'" nid="0" scrolling="auto" frameborder="0" style="height: 100%;width: 100%;"></iframe>');  //改变页面内容区域的地址
		$('.subm').show();
		$('.subm').html('<span>>>'+pcat+ '>>' +cating+'</span>');//当前位显示 栏目树
	});
	
	/* 点击管理员名称加载资料修改 */
	$('.adminrights').click(function() {
		setwindowheight();  //调用当前浏览器高度处理方法
		$('.ifcontent').attr('src', tplroot+'/Admin/Admin/AdminEditor');  //改变页面内容区域的地址
	});


});



