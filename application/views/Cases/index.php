<?php $this->load->view('header'); ?>

<!-- content -->
<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>成功案例</h1>
    </div>
    <div class="case-box">
      <div class="title contai">案例视频<a class="more" href="<?php echo makeurl('Video','CaseList',1); ?>">更多<span>&gt;</span></a></div>
      <div class="case-inner row">
        <?php
		if($video){
			foreach($video as $v){
				?>
                <div class="col-xs-6 pr7">
                  <div id="imgShow" class="img"> 
                    <a href="<?php echo makeurl('Video','Play'); ?>?ID=<?php echo $v['ID']; ?>&UID=EA332AE7-B478-4F57-BB8A-F4181570011F"> 
                      <img src="<?php echo absurl($v['ImgUrl']); ?>" style="height: 318.08px;"> 
                    </a> 
                  </div>
                  <div class="word contai">
                    <div><?php echo msicut($v['Title']); ?></div>
                  </div>
                </div>
                <?php
			}
		}
		?>
      </div>
    </div>
    <div class="case-box">
      <div class="title contai">精选案例<a class="more" href="<?php echo makeurl('Cases','Recommond',1); ?>">更多<span>&gt;</span></a></div>
      <div class="case-inner contai">
        <ul class="news_list" id="news_list">
          <li> <a href="<?php echo makeurl('Cases','Artile',$recommond[0]['ID']); ?>"><?php echo msicut($recommond[0]['Name']); ?></a>
            <p class="clearfix"></p>
          </li>
          <li> <a href="<?php echo makeurl('Cases','Artile',$recommond[1]['ID']); ?>"><?php echo msicut($recommond[1]['Name']); ?></a>
            <p class="clearfix"></p>
          </li>
          <li> <a href="<?php echo makeurl('Cases','Artile',$recommond[2]['ID']); ?>"><?php echo msicut($recommond[2]['Name']); ?></a>
            <p class="clearfix"></p>
          </li>
          <li> <a href="<?php echo makeurl('Cases','Artile',$recommond[3]['ID']); ?>"><?php echo msicut($recommond[3]['Name']); ?></a>
            <p class="clearfix"></p>
          </li>
        </ul>
      </div>
    </div>
    <div class="case-box case-check">
      <div class="title contai">按行业查询</div>
      <div class="inner contai">
        <ul>
          <?php
		  if($industry){
			  foreach($industry as $in){
				  ?>
                  <li class="col-xs-5"><a href="<?php echo makeurl('Cases','Lists',array($in['ID'],1)); ?>"><?php echo msicut($in['SubdivisionName']); ?></a></li>
				  <?php
			  }
		  }else{
			  
		  }
		  ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
