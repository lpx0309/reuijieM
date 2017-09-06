<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner detailsbanner solve-just">
    <div class="contai">
      <div class="management-list">
        <ul>
          <li style="list-style:none !important">
            <p><a><?php echo msicut($SubdivisionName); ?></a></p>
            <!--<div id="share" class="share"> 
              <a href="javascript:;"><img src="<?php echo $this->config->base_url(); ?>public/images/btn-share.png" id="share_btn"></a> 
            </div>-->
          </li>
        </ul>
      </div>
    </div>
    <div class="line"></div>
    
    <?php $this->load->view('share'); ?>
    
    <div class="contai setting">
      <div class="solve-gauge">
        <h3>方案概述</h3>
        <?php echo maketext($info['HtmlContent']); ?>
        <p>&nbsp; </p>
      </div>
    </div>
    
    <?php 
	if($frame['HtmlContent']&&$value['HtmlContent']){
		?>
        <div class="detals-intro tab-wrap">
          <ul class="tab-btn">
            <li style="width:50%" class="active">方案架构</li>
            <li style="width:50%">方案价值</li>
          </ul>
          <div class="tab-main">
            <div class="normal-detail" style="display: block;">
              <?php echo maketext($frame['HtmlContent']); ?>
              <p style="color: rgb(51, 51, 51); font-size: 1.16rem; margin-top: 1rem; line-height: 1.42857143;">&nbsp; </p>
            </div>
            <div class="normal-detail" style="display: none;">
              <?php echo maketext($value['HtmlContent']); ?>
              <p style="color: rgb(51, 51, 51); font-size: 1.16rem; margin-top: 1rem; line-height: 1.42857143;">&nbsp; </p>
            </div>
          </div>
        </div>
        <?php
	}
	?>
  </div>
</div>

<script type='text/javascript'>
    if (window._gsTracker) {
        _gsTracker.trackEvent("wap内容页", "方案", "Detail");
    }
</script>

<?php $this->load->view('footer'); ?>