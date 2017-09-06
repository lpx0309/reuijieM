<!-- footer -->
<div class="container footer">
  <div class="rjcon">
    <div class="footernav">
      <?php
	  if($this->uri->segment(1)){
		  ?>
		  <div class="back"><a href="<?php echo $this->config->base_url(); ?>">回首页</a> | <a href="javascript:;" onclick="history.back()">回上一页</a></div>
		  <?php
	  }
	  ?>
      <p> 
        <a href="<?php echo makeurl('Product'); ?>">产品</a> 
        <a href="<?php echo makeurl('Solution'); ?>">解决方案</a> 
        <a href="<?php echo makeurl('About'); ?>">关于锐捷</a> 
        <a href="<?php echo makeurl('Contact'); ?>">联系我们</a> 
        <a href="<?php echo makeurl('FeedBack');//,'','','.jsp' ?>">在线反馈</a> 
      </p>
      <p>版权所有© 2015锐捷网络<span style="margin-left:1rem;"></span>京ICP备13025710号-1</p>
    </div>
  </div>
</div>

<!-- 返回顶部 -->
<div class="popup" style="display: none;"><img class="" src="<?php echo $this->config->base_url(); ?>public/images/popup.jpg" alt="返回顶部"></div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	$('img').error(function(){
		$(this).attr('src','<?php echo $this->config->base_url(); ?>public/images/noimg2.png');					
	});	
});
</script>