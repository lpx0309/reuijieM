<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="videobox02" style="position:relative;">
      <h2><strong><?php echo msicut($video['Title']); ?></strong></h2>
      
      <div id="video" style="width:100%;padding:1px 0px;text-align:center;margin:0px auto;">
        <iframe width="100%" height="100%" src="<?php echo $video['url'];//echo makeurl('Video','Plugin',$id); ?>" frameborder="0" allowfullscreen="true"></iframe>
      </div>
      
      <div class="vpbox">
        <div class="vpnum"> 
          <a href="javascript:;" onClick="AddFavorite(window.location.href,&#39;云课堂开讲了之集群管理&#39;);"><span>收藏</span></a> 
        </div>
        <div id="share" class="share"> 
          <a href="javascript:;"><img src="<?php echo $this->config->base_url(); ?>public/images/vpout.png" id="share_btn"></a> 
        </div>
        <!--<div class="vpnum"> <span id="downNum"><?php echo $video['DownNum']; ?></span> </div>-->
        <div class="vpdown"> 
          <a href="javascript:;" onClick="UpDown(<?php echo $id; ?>,-1);"><img src="<?php echo $this->config->base_url(); ?>public/images/vpdown.png"></a> 
        </div>
        <!--<div class="vpnum"> <span id="upNum"><?php echo $video['UpNum']; ?></span> </div>-->
        <div class="vpupup"> 
          <a href="javascript:;" onClick="UpDown(<?php echo $id; ?>,1);"><img src="<?php echo $this->config->base_url(); ?>public/images/vpupup.png"></a> 
        </div>
        <div class="vpnum"> <span><?php echo $video['ClickNum']; ?></span> </div>
        <div> <img src="<?php echo $this->config->base_url(); ?>public/images/vpnum.png"> </div>
        
        <?php $this->load->view('share',array('style'=>'display: none; padding: 0px; top: auto; bottom: -5px; left: auto; right: 0px;')); ?>
    
      </div>
    </div>
    
    <div class="case-box">
      <div class="title contai">相关视频</div>
      <div class="case-inner row">
        <?php
		if($corr){
			foreach($corr as $c){
				?>
                <div class="col-xs-6 pr7">
                  <div id="imgShow" class="img"> 
                    <a href="<?php echo makeurl('Video','Play'); ?>?ID=<?php echo $c['ID']; ?>"> 
                      <img src="<?php echo absurl($c['ImgUrl'],true); ?>" style="height: 318.08px;"> 
                    </a> 
                  </div>
                  <div class="word contai">
                    <div><?php echo msicut($c['Title']); ?></div>
                  </div>
                </div>
                <?php
			}
		}else{
		?>
            <div class="col-xs-6 pr7">
              <div class="word contai">
                <div>暂无相关视频</div>
              </div>
            </div>
        <?php
		}
		?>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
    if (window._gsTracker) {
        _gsTracker.trackEvent("wap内容页", "视频", "Detail");
    }
</script>

<?php $this->load->view('footer'); ?>