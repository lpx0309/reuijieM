<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner solve-list">
    <div class="contai">
      <h1><?php echo msicut($SubdivisionName); ?>—成功案例</h1>
    </div>
    <div class="line"></div>
    <?php
    if($industry){
        ?>
        <div class="contai">
          <div class="normal-list">
            <ul>
            <?php
            foreach($industry as $in){
                ?>
                <li>
                  <p>
                    <a href="<?php echo  makeurl('Cases','Artile',$in['ID']); ?>">
                      <?php echo msicut($in['Name']); ?>
                    </a>
                  </p>
                </li>
                <?php
            }
            ?>
            </ul>
          </div>
        </div>
        <?php
		echo $page_bottom;
    }
	
	if($case&&!$industry){
		if(msicut($SubdivisionName)!='馆园场站'){
			?>
			<div class="contai">
			  <div id="switch" style="padding-top: 3%">
				<ul class="news_list">
				<?php
				$k=0;
				foreach($case as $c){
					if(msicut($c['SubdivisionName'])!='解决方案'){
						?>
						<li><a href="<?php echo  makeurl('Cases','Lists',array($c['ID'],1)); ?>"><?php echo msicut($c['SubdivisionName']); ?></a></li>
						<?php
						$k++;
					}
				}
				if($k==0){
					?>
                    <li>暂无内容</li>
                    <?php
				}
				?>
				</ul>
			  </div>
			</div>
			<?php
		}else{
			?>
				<div class="contai">
				  <div id="switch" style="padding-top: 3%">
					<ul class="news_list">
					  <li>暂无内容</li>
					</ul>
				  </div>
				</div>
			<?php
			
		}
	}
	?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
