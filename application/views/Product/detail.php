<?php $this->load->view('header'); ?>

<!-- content -->
<div class="container content-wrap">
<div class="content-inner detailsbanner">
  <div class="contai pro-details">
    <h1><?php echo msicut($productDetail['ProductSeriesName']); ?></h1>
  </div>
  <div class="line"></div>
  <div id="slidebanner" class="carousel slide" data-ride="carousel" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <!-- Indicators --><!--图片-->
    <ol class="carousel-indicators">
      <?php
	  if($productPic){
		  for($i=0;$i<count($productPic);$i++){
			  ?>
              <li data-target="#slidebanner" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
              <?php
		  }
	  }
	  ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
	  <?php
      if($productPic){
          foreach($productPic as $key=>$Pic){
              ?>
              <div class="item <?php if($key==0){ ?> active <?php } ?>" align="center"> 
                <a href="<?php echo absurl($Pic['PicPath'],true); ?>">
                  <img src="<?php echo absurl($Pic['PicPath'],true); ?>" />
                </a> 
              </div>
              <?php
          }
      }else{
          
      }
      ?>
    </div>
  </div>
  
  <div class="detail-text">
    <!--产品概述-->
    <?php 
	if($productDetail['a1']==1){
		echo maketext($productDetail['ss1']); 
	}
	?>
    
    <!--分享咨询-->
    <p class="btns"> <!--<a href="javascript:;" class="share" id="share_btn">立即分享</a>--> <a href="tel:4006-208-818" class="tel">电话咨询</a> </p>
    
    <div style="margin: 0 auto;padding-top:1rem;width: 272px;position: relative;">
      <?php $this->load->view('share',array('class'=>'bdshare_t bds_tools_32 get-codes-bdshare sharedivP')); ?>
    </div>
    
  </div>
</div>

<div class="detals-intro tab-wrap">
  <ul class="tab-btn">
    <li class="active">产品特征</li>
    <li>技术参数</li>
    <li>典型应用</li>
  </ul>
  <div class="tab-main">
    <div class="normal-detail">
	  <?php 
      if($productDetail['a2']==1){
          echo maketext($productDetail['ss2']); 
      }
      ?>
    </div>
    <div class="normal-detail">
	  <?php 
      if($productDetail['a3']==1){
          echo maketext($productDetail['ss3']); 
      }
      ?>
    </div>
    <div class="normal-detail">
	  <?php 
      if($productDetail['a4']==1){
          echo maketext($productDetail['ss4']); 
      }
      ?>
    </div>
  </div>
</div>

<script type='text/javascript'>
    if (window._gsTracker) {
        _gsTracker.trackEvent("wap内容页", "产品", "Detail");
    }
</script>

<?php $this->load->view('footer'); ?>