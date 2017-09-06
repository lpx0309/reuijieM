<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>停产产品查询</h1>
    </div>
    
    <?php
	if($stop){
		foreach($stop as $s){
			if($s['ID']==3224){
				?>
                <div class="service-title"> 
                  <!--<a href="<?php echo makeurl('Service','StopProductDetail',$s['detail']); ?>"><?php echo msicut($s['SubdivisionName']); ?></a>--> 
                  <a href="<?php echo $this->config->base_url(); ?>service/1/-1/38979.html"><?php echo msicut($s['SubdivisionName']); ?></a> 
                </div>
                <?php
			}else{
				?>
				<div class="service-title"> <?php echo msicut($s['SubdivisionName']); ?> </div>
				<div class="contai">
				  <div class="normal-list stopProduct">
					<ul>
					  <?php
					  if($s['product']){
						  foreach($s['product'] as $p){
							  ?>
							  <li>
								<p><a href="<?php echo makeurl('Service','StopProductList',array($p['ID'],1)); ?>"><?php echo msicut($p['SubdivisionName']); ?></a></p>
							  </li>
							  <?php
						  }
					  }
					  ?>
					</ul>
				  </div>
				</div>
				<?php
			}
		}
	}
	?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
