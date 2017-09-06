<?php $this->load->view('header'); ?>
<!--视频列表-->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1><?php echo $title; ?></h1>
    </div>
    <div class="case-box">
      <div class="case-inner row">
      	<?php
		if($list){
			foreach($list as $l){
				?>
                <div class="col-xs-6 pr7">
                  <div id="imgShow" class="img"> 
                    <a href="<?php echo makeurl('Video','Play'); ?>?ID=<?php echo $l['ID']; ?>">
                     <img src="<?php echo absurl($l['ImgUrl'],true); ?>" style="height: 318.08px;"> 
                    </a> 
                  </div>
                  <div class="word contai">
                    <div><?php echo msicut($l['Title']); ?></div>
                  </div>
                </div>
                <?php
			}
		}
		?>
      </div>
    </div>
	<?php echo $page_bottom; ?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
