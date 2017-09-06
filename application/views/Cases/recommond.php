<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>精选案例—成功案例<?php //echo msicut($SubdivisionName); ?></h1>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="normal-list">
        <ul>
          <?php
		  if($recommond){
			  foreach($recommond as $rmd){
				  ?>
                  <li>
                    <p><a href="<?php echo makeurl('Cases','Artile',$rmd['ID']); ?>"><?php echo msicut($rmd['Name']); ?><span class="time"></span></a></p>
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
