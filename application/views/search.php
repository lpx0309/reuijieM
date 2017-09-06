<?php $this->load->view('header'); ?>
<!--搜索-->

<div class="container content-wrap">
  <!-- search -->
  <div class="container search">
    <form id="search" method="get" action="<?php echo makeurl('Search'); ?>">
      <?php 
	  if($type){ 
		  ?> 
		  <input type="hidden" name="type" value="<?php echo $type;  ?>" /> 
		  <?php 
	  } 
	  ?>
      <input type="text" class="sinput" name="kw" value="<?php echo $kw; ?>">
      <input type="button" class="sbutton" onClick="$('#search').submit();">
    </form>
  </div>
  
  <div class="container content-wrap">
    <div class="content-inner">
      <div class="contai">
        <div class="normal-list">
          <ul>
            <?php
			if($result){
				foreach($result as $r){
					switch($type){
						case 'product':
							$prefix='产品';
							$url=makeurl('Product','Detail',array(mt_rand(1000,9999),$r['ID']));
						break;
						
						case 'faq':
							$prefix='常见问题';
							$url=makeurl('Service','FaqDetail',$r['ID']);
						break;
						
						default:
							if(isset($r['type'])){
								switch($r['type']){
									case 'CNews':
										$prefix='公司新闻';
										$url=makeurl('News','Detail',$r['ID']);
									break;
									
									case 'CSolution':
										/*if($r['istag']==1){
											$prefix='成功案例';
											$url=makeurl('Cases','Artile',$r['ID']);
										}else{*/
											$prefix='解决方案';
											$url=makeurl('Solution','Detail',$r['ID']);
										//}
									break;
									
									case 'CKnows':
										$prefix='常见问题';
										$url=makeurl('Service','FaqDetail',$r['ID']);
									break;
									
									default:
										$prefix='文档';
										$url=makeurl('News','Detail',$r['ID']);
									break;
								}
							}else{
								if(isset($r['AddTime'])){
									$prefix='产品';
									$url=makeurl('Product','Detail',array(mt_rand(1000,9999),$r['ID']));
								}else{
									$prefix='视频';
									$url=makeurl('Video','Play').'?ID='.$r['ID'];
								}
							}
						break;
					}
					?>
                    <li>
                      <p> 
                        <a href="<?php echo $url; ?>"> 
						  <!--【<?php echo $prefix; ?>】-->
						  <?php echo str_replace($kw,'<font color="red">'.$kw.'</font>',msicut($r['Name'])); ?> 
                        </a> 
                      </p>
                    </li>
                    <?php
				}
			}else{
				?>
                <li><p><a>暂无任何结果</a></p></li>
                <?php
			}
			?>
          </ul>
        </div>
        <?php echo $page_bottom; ?>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>