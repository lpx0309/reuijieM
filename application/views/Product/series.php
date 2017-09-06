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
    <div class="contai category">
      <h1><?php echo msicut($TypeName); ?></h1>
    </div>
    <?php
	if($productType){
		foreach($productType as $Type){
			?>
			<h2 class="category-name"><?php echo msicut($Type['TypeName']); ?></h2>
			<ul class="product-list">
			  <?php
			  if($Type['series']){
				  foreach($Type['series'] as $series){
					  ?>
					  <li> 
						<a href="<?php echo makeurl('Product','Detail',array($pid,$series['ID'])); ?>">
						  <img src="<?php echo absurl($series['Thumbnail'],true); ?>" alt="" style="max-width:29%">
						</a>
						<div class="text" style="width:70.66%"> 
						  <a href="<?php echo makeurl('Product','Detail',array($pid,$series['ID'])); ?>" style="color:#333">
						  <p><?php echo msicut($series['ProductSeriesName']); ?></p>
						  </a> 
						  <a href="<?php echo makeurl('Product','Detail',array($pid,$series['ID'])); ?>">了解详情   &gt;</a> 
						</div>
					  </li>
					  <?php
				  }
			  }else{
				  ?>
                  <li><div style="text-align:center; padding-top:6%; font-size:36px">该类型暂无任何产品系列</div></li>
                  <?php
			  }
			  ?>
			</ul>
			<br>
			<?php
		}
	}else{
		
	}
	?>
  </div>
</div>

<?php $this->load->view('footer'); ?>