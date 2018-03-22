$(function(){
	var len = $(".lennumb");
	len.each(function(){
		if($(this).children("ul").children("li").length == 0){
			$(this).children(".nocousr").show();
			$(this).siblings(".w_um_more").hide();
			}
			else{
				}
	});			
});

 $(".my_shy_user li h5").click(function(){
     $(this).children("i").toggleClass("isc");
     $(this).parent().siblings().children(".sy_conte").hide(500);
     $(this).siblings(".sy_conte").toggle(500);
 });

//producdetails:Start
	function shopbuys(obj){
		var act = $(obj).attr("data-action");
		$("#formact").attr("action",act);
		$(".shopcarlayer").show();
	};
	
	function sholayhd(){
		$(".shopcarlayer").hide();
	};
	
	$(".sharebgs").click(function(){
		$(this).hide();
	});
	
	function shareurla(){
		$(".sharebgs").show();
	};
	
	$(function(){
		var uri = parseFloat($(".cu_n_num").text()).toFixed(2);
		var am = $(".anpnumb");
		// 减
		$(".byless").click(function(){
		    var n  = parseInt(am.val());
			if(n > 1){
				am.val(n-1);
				$(".godquntil").text(n-1);
				$(".alprice").text(((n-1)*uri).toFixed(2));
			}
		});
		// 加
		$(".byaddc").click(function(){
		  var am = $(".anpnumb");
		  var n  = parseInt(am.val());
		  am.val(n+1);
		  $(".godquntil").text(n+1);
		  $(".alprice").text(((n+1)*uri).toFixed(2));
		});
		
		 $(".anpnumb").on("input",function(){
			 var n  = parseInt($(".anpnumb").val());
			 $(".godquntil").text(n);
			 $(".alprice").text(((n)*uri).toFixed(2));
		 });
		
	});
//producdetails:End



$(function(){
		$("select").wrap("<div class='seleflor'></div>")
});
//banner Swiper
 $(function(){
	    var mySwiper = new Swiper('.index_banner',{
		loop : true,
		autoplay:2000,
		autoplayDisableOnInteraction : false,
        pagination : '.swiper-pagination',
        paginationClickable :true,
        });
	 
	    var mySwiper = new Swiper('.produ_focus',{
		loop : true,
		autoplay:5000,
		autoplayDisableOnInteraction : false,
        pagination : '.swiper-pagination',
        paginationClickable :true,
        });
		
		var mySwiper = new Swiper('.index_newslis',{
			direction : 'vertical',
			loop : true,
			autoplay:3200,
			autoplayDisableOnInteraction : false,
		});
  });


