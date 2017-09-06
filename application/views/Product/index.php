<?php $this->load->view('header'); ?>

<!-- content -->
<div class="container content-wrap">
  <!-- search -->
  <div class="container search">
    <form id="search" method="get" action="<?php echo makeurl('Search'); ?>">
      <input type="hidden" name="type" value="product" />
      <input type="text" class="sinput" name="kw">
      <input type="button" class="sbutton" onClick="$('#search').submit();">
    </form>
  </div>
  
  <div class="content-inner">
    <ul class="category-list">
      <?php
	  $default_ico='http://image.ruijie.com.cn/Upload/AboutRJ/2015/1-6/2015162360186.png';
	  if($productType){
		  foreach($productType as $Type){
			  if(!$Type['ico']){
				  $Type['ico']= $default_ico;
			  }
			  ?>
              <li style="background: url(<?php echo $Type['ico']; ?>) 0.5rem center/1.333rem 1.333rem no-repeat,url(<?php echo $this->config->base_url(); ?>public/images/left-arrow.png) 95% center/7px 11px no-repeat;"> 
                <a href="<?php echo makeurl('Product','Series',$Type['ID']); ?>"><?php echo msicut($Type['TypeName']); ?></a> 
              </li>
			  <?php
		  }
	  }else{
		  ?>
          <li style="background: url(<?php echo $default_ico; ?>) 0.5rem center/1.333rem 1.333rem no-repeat,url(<?php echo $this->config->base_url(); ?>public/images/left-arrow.png) 95% center/7px 11px no-repeat;"> 
            <a href="javascript:;">暂无任何产品类型</a>
          </li>
		  <?php
	  }
	  ?>
    </ul>
  </div>
</div>

<?php $this->load->view('footer'); ?>
