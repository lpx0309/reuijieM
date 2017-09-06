<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner solve-list">
    <div class="contai">
      <h1><?php echo msicut($SubdivisionName); ?></h1>
    </div>
    
    <?php
	if($industry){
		foreach($industry as $key=>$in){
			if($key<2){
			?>
            <div class="solve-title"> 
              <span><?php echo msicut($in['SubdivisionName']);  ?></span> 
              <a href="<?php echo makeurl('Solution','More',array($in['ID'],1)); ?>">更多</a> 
            </div>
            <div class="contai">
              <div class="normal-list">
                <ul>
                  <?php
                  if($in['solution']){
					  foreach($in['solution'] as $so){
						  ?>
						  <li>
							<p>
                              <a href="<?php echo  makeurl('Solution','Detail',$so['ID']/*array($in['ID'],$so['ID'])*/); ?>">
                                <?php echo msicut($so['Name']); ?>
                              </a>
                            </p>
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
