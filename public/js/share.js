
$(
	function(){
		$('#bdshare').hide();
		$('#share_btn').click(function(){
			$('#bdshare').show();
		});
		$('#close').click(function(){
			$('#bdshare').hide();
		});
	}	
);