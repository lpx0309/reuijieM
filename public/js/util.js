$(function(){
	slidebanner();
	totop();
	videoplayer();
	tab();
})

// 轮播
function slidebanner(){
	$('.carousel').carousel();
	$('.carousel').hammer().on('swipeleft', function(){
	  $(this).carousel('next');
	 });
	$('.carousel').hammer().on('swiperight', function(){
	  $(this).carousel('prev');
	 });
}

$(window).on({
	'scroll':function(){
		vScroll();
	}
})

// 返回顶部
function vScroll(){
	var top = $(document).scrollTop();
	var pop = $('.popup');
	if( top > 100){
		pop.show();
	}else{
		pop.hide();
	}
}
function totop(){
	var pop = $('.popup');
	pop.click(function(){
		$('html,body').animate({scrollTop:0},500);
	})
}

// 视频播放
function videoplayer(){
	var jwplayer_url = "../jwplayer/";
	$('.videoplayer').each(function(){
		var _url = $('#videoplayer').attr('data-src');
		var _img = $('#videoplayer').attr('data-img');
		var _Width = $('.videoplayer').width();
		var _Height = _Width*0.55;
		$('.videoplayer').css({"height":_Height});

		jwplayer("videoplayer").setup({
			skin: jwplayer_url+"/skins/glow.zip",
			stretching: "fill",
			flashplayer: jwplayer_url+"player.swf",
			// image: _img,
			file:_url,
			control: false,
			width: _Width,
			height: _Height
		});
	})
}
//tab切换
function tab(){
	/*var tab = $('.tab-wrap .tab-btn li');
	var con = $('.tab-wrap .tab-main div');
	tab.removeClass('active').eq(0).addClass('active');
	con.hide().eq(0).show();
	tab.click(function(event) {
		var index = tab.index($(this));
		tab.removeClass('active').eq(index).addClass('active');
		con.hide().eq(index).show();
	});*/
	var li=0;
	$('.tab-btn').children().each(function(){
		$(this).attr('id','tab_li_'+li);								   
		$(this).click(function(){
			$('.tab-btn').children().each(function(){
				$(this).attr('class','');						   
			});
			$(this).attr('class','active');
			
			$('.tab-main').children().each(function(){
				$(this).hide();	
			});
			
			var index=$(this).attr('id').split('_');
			//alert(index[2]);
			$('#tab_div_'+index[2]).show()
		});	
		li++;
	});
	
	var div=0;
	$('.tab-main').children().each(function(){
		$(this).attr('id','tab_div_'+div);	
		div++;
	});
}
