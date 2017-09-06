<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>常见问题</h1>
    </div>
    <div class="line"></div>
    <!-- search -->
    <div class="contai search faq_search">
      <form id="search" method="get" action="<?php echo makeurl('Search'); ?>">
        <input type="hidden" name="type" value="faq" />
        <input type="text" class="sinput" name="kw" placeholder="输入产品型号或关键词，获取产品常见问题答案">
        <input type="button" class="sbutton" onClick="$('#search').submit();">
      </form>
    </div>
    
    <div class="contai">
      <div class="normal-list">
        <ul>
          <?php
		  if($faq){
			  foreach($faq as $f){
				  ?>
                  <li>
                    <p><a href="<?php echo makeurl('Service','FaqDetail',$f['ID']); ?>"><?php echo msicut($f['Name']); ?></a></p>
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
