<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <div class="management-list">
        <ul>
          <li style="list-style:none  !important">
            <p><a><?php echo msicut($detail['Name']); ?></a></p>
            <p><span>时间：<?php echo date('Y-m-d',strtotime($detail['AddTime'])); ?></span></p>
            <p><span>点击量：<?php echo $detail['CallNum']; ?></span></p>
            <?php
			if($detail['Size']){
			?>
                <p><span>附件：<a href="http://www.ruijie.com.cn/fw/down/<?php echo $detail['ID']; ?>" style="font-size:1rem; font-weight:normal; color:#428bca">
				<?php echo msicut($detail['Attachment']); ?></a></span></p>
            <?php
			}
			?>
            <!--<div id="share" class="share"> 
              <a href="javascript:;"><img src="<?php echo $this->config->base_url(); ?>public/images/btn-share.png" id="share_btn"></a> 
            </div>-->
          </li>
        </ul>
      </div>
    </div>
    <div class="line"></div>
    
    <?php $this->load->view('share'); ?>
    
    <div class="contai">
      <div class="normal-detail">
        <?php echo maketext($detail['HtmlContent']); ?>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
    if (window._gsTracker) {
        _gsTracker.trackEvent("wap内容页", "方案", "Detail");
    }
</script>

<?php $this->load->view('footer'); ?>