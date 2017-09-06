<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner solve-list solve-tactic">
  
    <div class="contai">
      <h1>解决方案</h1>
    </div>
    
    <div class="solve-title"> <span>业务解决方案</span> </div>
    <div class="solve-tactic-list">
      <?php
	  foreach($yewu as $col){
		  ?>
          <div class="pack">
          <?php
		  foreach($col as $row){
			  ?>
              <div class="col-xs-6 col"> <a href="<?php echo absurl($row['Adurl']); ?>"><img src="<?php echo absurl($row['Imgurl'],true); ?>" alt=""></a> </div>
              <?php
		  }
		  ?>
          </div>
          <?php
	  }
	  ?>
    </div>
    
    <div class="solve-title"> <span>行业解决方案</span> </div>
    <div class="solve-tactic-list">
      <?php
	  foreach($Industry as $col){
		  ?>
          <div class="pack">
          <?php
		  foreach($col as $row){
			  ?>
              <div class="col-xs-4 col"> <a href="<?php echo absurl($row['Adurl']); ?>"><img src="<?php echo absurl($row['Imgurl'],true); ?>" alt=""></a> </div>
              <?php
		  }
		  ?>
          </div>
          <?php
	  }
	  ?>
      <div class="pack">
        <div class="col-xs-12 col"> <a href="<?php echo absurl($ruiyi['Adurl']); ?>"><img src="<?php echo absurl($ruiyi['Imgurl'],true); ?>" alt=""></a> </div>
      </div>
    </div>
    
  </div>
</div>

<?php $this->load->view('footer'); ?>