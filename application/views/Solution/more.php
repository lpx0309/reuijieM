<?php $this->load->view('header'); ?>

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
		  if($solution){
			  foreach($solution as $so){
				  ?>
                  <li>
                    <p><a href="<?php echo makeurl('Solution','Detail',$so['ID']); ?>"><?php echo msicut($so['Name']); ?><span class="time"></span></a></p>
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
