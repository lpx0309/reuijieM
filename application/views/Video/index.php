<?php $this->load->view('header'); ?>
<!--视频-->
<!-- content -->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>视频中心</h1>
    </div>
    
    <div class="videobox01">
      <div id="video" style="width:100%;padding:1px 0px;text-align:center;margin:0px auto;">
        <iframe width="100%" height="100%" src="<?php echo $recommond['url'];//echo makeurl('Video','Plugin',$recommond['ID']); ?>" frameborder="0" allowfullscreen="true"></iframe>
      </div>
      <h2><?php echo msicut($recommond['Title']); ?></h2>
      <div class="vpbox">
        <div> <img src="<?php echo $this->config->base_url(); ?>public/images/vpnum.png"> </div>
        <div class="vpnum"> <span><?php echo $recommond['ClickNum']; ?></span> </div>
        <div class="vpupup"> 
          <a href="javascript:;" onClick="UpDown(<?php echo $recommond['ID']; ?>,1);">
            <img src="<?php echo $this->config->base_url(); ?>public/images/vpupup.png">
          </a> 
        </div>
        <!--<div class="vpnum"> <span id="upNum"><?php echo $recommond['UpNum']; ?></span> </div>-->
        <div class="vpdown"> 
          <a href="javascript:;" onClick="UpDown(<?php echo $recommond['ID']; ?>,-1);">
            <img src="<?php echo $this->config->base_url(); ?>public/images/vpdown.png">
          </a> 
        </div>
        <!--<div class="vpnum"> <span id="downNum"><?php echo $recommond['DownNum']; ?></span> </div>-->
      </div>
    </div>
    
  </div>
</div>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="case-box">
      <div class="title contai">产品<a class="more" href="<?php echo makeurl('Video','ProductList',1); ?>">更多<span>&gt;</span></a></div>
      <div class="case-inner row">
        <?php
		if($product){
			foreach($product as $p){
				?>
                <div class="col-xs-6 pr7">
                  <div id="imgShow" class="img"> 
                    <a href="<?php echo makeurl('Video','Play'); ?>?ID=<?php echo $p['ID']; ?>&UID=CE105824-31EC-47DA-BFF5-FACD6C1254C1"> 
                      <img src="<?php echo absurl($p['ImgUrl'],true); ?>" style="height: 318.08px;"> 
                    </a> 
                  </div>
                  <div class="word contai">
                    <div><?php echo msicut($p['Title']); ?></div>
                  </div>
                </div>
                <?php
			}
		}
		?>
      </div>
    </div>
  </div>
</div>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="case-box">
    
      <div class="title contai">解决方案<a class="more" href="<?php echo makeurl('Video','SolutionList',1); ?>">更多<span>&gt;</span></a></div>
      <div class="case-inner row">
      	<?php
		if($solution){
			foreach($solution as $s){
				?>
                <div class="col-xs-6 pr7">
                  <div id="imgShow" class="img"> 
                    <a href="<?php echo makeurl('Video','Play'); ?>?ID=<?php echo $s['ID']; ?>&UID=D3ACBBDB-C1BD-4F12-BF88-2289788610E7"> 
                      <img src="<?php echo absurl($s['ImgUrl'],true); ?>" style="height: 318.08px;"> 
                    </a> 
                  </div>
                  <div class="word contai">
                    <div><?php echo msicut($s['Title']); ?></div>
                  </div>
                </div>
                <?php
			}
		}
		?>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
