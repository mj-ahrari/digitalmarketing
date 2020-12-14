$(document).ready(function(e) {
	$(".porforushhiddenbox").hide();
	$(".porforushhiddenboxclick").click(function(){
		$(this).parent().prev().toggle();
	});
	$("#first-special-1").css({"background-color":"#09f","color":"#fff"});
	$("#first-special-2").css({"background-color":"#fff","color":"#000","background-image":"url(images/arrow.gif)","background-position":"center","background-repeat":"no-repeat","background-size":"32px"});
	$(".topmenu-li-top").hover(function(){
		//$(this).next(".topmenu-li-bottom").animate({backgroundColor: "#09f"});
		$(this).next(".topmenu-li-bottom").css('background-color','#F60');
	},function(){
		$(this).next(".topmenu-li-bottom").css('background-color','');
		$(this).css("box-shadow","");
		//$(this).next(".topmenu-li-bottom").animate({backgroundColor: ""});
	});
	$("#login-box").hide();
	$("#header_login_txt").click(function(){
		$("#login-box").toggle();
	});
	$(function () { 
  		$('#demo5').scrollbox({
    	direction: 'h',
    	distance: 0
  		});
	});
	$(".sp-r-1").click(function(){
		var pid=$(this).attr('name');
		$.ajax({
			type:"POST",
			url: "checking/wonderfullcheck.php",
			data: {productid:pid},
			success: function(data){
				var x=JSON.parse(data);
				$("#wonderimage").attr("src",x['picture']);
				$("#spt").html((x['title']));
				$("#spt-1").html("این محصول دارای گارانتی:"+x['garanti']+" روزه است<br /><br />"+
"فروشنده : شرکت زنون ایران<br /><br />"+
"ارسال به تمامی نقاط کشور از طریق پست.<br /><br />"+"قیمت : "+x['price']+"  تومان"+"<br /><br /><a id=wonderimagehref class=emsp href=single.php?pid="+x['productpid']+">مشاهده جزئیات</a>");

				$("#wonderimagehref").attr("href","single.php?pid="+x['productpid']);
				}
			});
		$(".sp-r-2").css({"background-image":""});
		$(this).next(".sp-r-2").css({"background-color":"#fff","color":"#000","background-image":"url(images/arrow.gif)","background-position":"center","background-repeat":"no-repeat","background-size":"32px"});
		$(".sp-r-1").css({"background-color":"#fff","color":"#000","border":"solid 1px #bbb"});
		$(this).css({"background-color":"#09f","color":"#FFF"});	
		
	});
	$("#foo-1-1-matn").click(function(){
		$("html,body").animate({ scrollTop: 0 }, "slow");	
	});
});
