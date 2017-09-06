<?php //header("Content-Type:text/html;charset=gb2312"); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php if(isset($title)){echo $title;}else{ ?> 锐捷网络 <?php } ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>public/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>public/css/share.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>public/css/public.css">

<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/hammer.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/jquery-hammer.js"></script>
<!--<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/jwplayer.js"></script>-->
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/util.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>public/js/share.js"></script>

<!-- Gridsum tracking code begin. -->
<!--<script type='text/javascript' src='http://static.gridsumdissector.com/js/Clients/GWD-002546-17F604/gs.js'></script>-->
<script type='text/javascript'>
    (function(){
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = (location.protocol == 'https:' ? 'https://ssl.' : 'http://static.') + 'gridsumdissector.com/js/Clients/GWD-002546-17F604/gs.js';
        var firstScript = document.getElementsByTagName('script')[0];
        firstScript.parentNode.insertBefore(s, firstScript);
    })();
</script>
<!--Gridsum tracking code end. -->

<script type='text/javascript'>
function OnlickService(){
	if(window.GridsumWebDissector){
		var _gsTracker =GridsumWebDissector.getTracker('GWD-002546');
		_gsTracker.trackEvent('在线客服');
		_gsTracker.track('/targetpage/online_kf.html');
	}
}

function UpDown(id,val) {
	$.ajax( {
		type : "POST",
		url : "<?php echo makeurl('Video','UpDown'); ?>",
		data : {id:id,val:val},
		success : function(msg) {
			if(msg){
				alert(msg);
				//console.log(msg);
			}else{
				if(val==1){
					var upNum=parseInt($('#upNum').html());
					$('#upNum').html(upNum+=1);
				}else{
					var downNum=parseInt($('#downNum').html());
					$('#downNum').html(downNum+=1);
				}
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
		}
	});
}

function AddFavorite(url,title){
	if (document.all){
		window.external.AddFavorite(url,title);
	}
	else if (window.sidebar){
		window.sidebar.addPanel(title,url, "");
	}
}

$(function(){
	$("#imgShow img").each(function(){
		$(this).css({
			height:parseInt($(this).width())* 0.56+"px"
		});
	});
});
</script>
</head>
<body>

<!-- header -->
<div id="header" class="fixed-top">
  <div class="container-fluid header">
    <div class="row">
      <div class="hlogo">
        <a href="<?php echo $this->config->base_url(); ?>"><img class="img100ph" src="<?php echo $this->config->base_url(); ?>public/images/hlogo.png"></a>
      </div>
      
      <div class="hphone">
        <a href="tel:4006-208-818"><img class="img100ph" src="<?php echo $this->config->base_url(); ?>public/images/hphone.png"></a>
      </div>
      
      <!--<div class="hsearch">
        <a href="http://m.ruijie.com.cn/ruijie/search.html">
          <img style="display:none" class="img100ph" src="<?php echo $this->config->base_url(); ?>public/images/hsearch.png">
        </a>
      </div>-->
      
    </div>
  </div>
</div>
