<?php $this->load->view('header'); ?>
<!--停产产品列表-->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1><?php echo msicut($SubdivisionName); ?></h1>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="normal-list">
        <ul>
          <?php
		  if($list){
			  foreach($list as $l){
			  ?>
			  <li>
				<p>
                  <a href="<?php echo makeurl('Service','StopProductDetail',$l['ID']); ?>">
					<?php echo msicut($l['Name']); ?><span class="time"><?php echo date('Y-m-d',strtotime($l['AddTime'])); ?></span>
                  </a>
                </p>
			  </li>
			  <?php
			  }
		  }
		  ?>
        </ul>
      </div>
      <?php echo $page_bottom; ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>
