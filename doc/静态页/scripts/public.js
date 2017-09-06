$(function(){
	upDown();
})

function upDown(){
	var _wrap = $('.contact-dl');
	var btns = _wrap.find('dt');
	btns.click(function(){
		$(this).siblings('dd').toggle();
	})
}