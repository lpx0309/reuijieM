<?php $this->load->view('header'); ?>
<!--新闻-->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>公司新闻</h1>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="normal-list">
        <ul>
          <?php
		  if($news){
			  foreach($news as $n){
				  ?>
                  <li>
                    <p><a href="<?php echo makeurl('News','Detail',$n['ID']); ?>"><?php echo msicut($n['Name']); ?><span class="time"></span></a></p>
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
