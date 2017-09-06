<?php $this->load->view('header'); ?>

<!-- slidebanner -->
<div class="container-fluid slidebanner">
  <div class="row">
    <div id="slidebanner" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
		if($banner){
			for($i=0;$i<count($banner);$i++){
				?>
                <li data-target="#slidebanner" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
                <?php
			}
		}else{
			
		}
		?>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php
		if($banner){
			foreach($banner as $k=>$b){
				?>
                <div class="item <?php if($k==0){ ?> active <?php } ?>"> 
                  <a href="<?php echo trim($b['Adurl']); ?>"><img class="img100pw" src="<?php echo trim($b['Imgurl']); ?>" alt=""></a> 
                </div>
                <?php
			}
		}else{
			
		}
		?>
      </div>
    </div>
  </div>
</div>

<!-- search -->
<div class="container search">
  <form id="search" method="get" action="<?php echo makeurl('Search'); ?>">
    <input type="text" class="sinput" name="kw">
    <input type="button" class="sbutton" onClick="$('#search').submit();">
  </form>
</div>

<!-- navbox -->
<div class="container navbox">
  <div class="hsmcol">
    <div class="col-xs-3 col hsmcol0"> 
      <a href="<?php echo makeurl('Product'); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon01.png">
          <p>产   品</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0"> 
      <a href="<?php echo makeurl('Solution'); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon02.png">
          <p>解决方案</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0"> 
      <a href="<?php echo makeurl('Cases'); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon03.png">
          <p>应用案例</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0 last"> 
      <a href="<?php echo makeurl('Service'); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon04.png">
          <p>服务与支持</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0"> 
      <a href="<?php echo makeurl('News','',array(691,1)); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon05.png">
          <p>新闻资讯</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0"> 
      <a href="<?php echo makeurl('Video'); ?>">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon07.png">
          <p>视频中心</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0"> 
      <a href="http://mall.ruijie.com.cn/index.php?com=com_shop">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon09.png">
          <p>在线购买</p>
        </div>
      </a> 
    </div>
    
    <div class="col-xs-3 col hsmcol0 last"> 
      <a href="http://webchat.ruijie.com.cn/live800/chatClient/chatbox.jsp?companyID=8933&configID=7&skillId=1&k=1" onClick="OnlickService();">
        <div class="navcon"> <img src="<?php echo $this->config->base_url(); ?>public/images/navcon08.png">
          <p>在线客服</p>
        </div>
      </a> 
    </div>
  </div>
</div>

<!-- 产品inpro -->
<div class="container content-wrap inpro">
  <div class="content-inner">
    <div class="contai">
      <h1>产品</h1>
      <div class="more"><a href="<?php echo makeurl('Product'); ?>">更多 ></a></div>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="row inpro-imgbox hsmcol">
      
        <div class="col-xs-6 col1 hsmcol0"> 
          <a href="<?php echo absurl($product[0]['Adurl']); ?>"><img src="<?php echo absurl($product[0]['Imgurl']); ?>"></a> 
        </div>
        
        <div class="col-xs-6 hsmcol0">
          <div class="col2"> 
            <a href="<?php echo absurl($product[1]['Adurl']); ?>"> <img src="<?php echo absurl($product[1]['Imgurl']); ?>"></a> 
          </div>
            
          <div class="col3">
            <a href="<?php echo absurl($product[2]['Adurl']); ?>"> <img src="<?php echo absurl($product[2]['Imgurl']); ?>"></a> 
          </div>
        </div>
        
      </div>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="inpro-list row">
        <ul>
		  <?php
          if($productType){
              foreach($productType as $Type){
                  ?>
                  <li class="col-xs-3"> 
                    <a href="<?php echo makeurl('Product','Series',$Type['ID']); ?>">
					  <?php
					  //echo mb_substr($Type['TypeName'],0,4,'utf-8'); 
					  $TypeName=msicut($Type['TypeName']);
					  if(strlen($TypeName)>12){
						  echo str_replace('产品','',$TypeName);
					  }else{
						  echo $TypeName;
					  }
					  ?>
                    </a> 
                  </li>
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

<!-- 解决方案insol -->
<div class="container content-wrap insol">
  <div class="content-inner">
    <div class="contai">
      <h1>解决方案</h1>
      <div class="more"><a href="<?php echo makeurl('Solution'); ?>">更多 ></a></div>
    </div>
    <div class="contai">
    
      <div class="row insol-imgbox hsmcol">
        <div class="col-xs-6 col1 hsmcol0"> 
          <a href="<?php echo absurl($solution[0]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($solution[0]['Imgurl']); ?>"></a>
        </div>
        
        <div class="col-xs-6 hsmcol0">
          <div class="col2"> 
            <a href="<?php echo absurl($solution[1]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($solution[1]['Imgurl']); ?>"></a> 
          </div>
          
          <div class="col3"> 
            <a href="<?php echo absurl($solution[2]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($solution[2]['Imgurl']); ?>"></a> 
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- 案例中心incas -->
<div class="container content-wrap incas">
  <div class="content-inner">
    <div class="contai">
      <h1>案例中心</h1>
      <div class="more"><a href="<?php echo makeurl('Cases'); ?>">更多 ></a></div>
    </div>
    <div class="contai">
      <div class="row incas-imgbox hsmcol">
        <div class="col1"> 
          <a href="<?php echo absurl($case[0]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($case[0]['Imgurl']); ?>"> </a> 
        </div>
        
        <div class="col-xs-6 col2 hsmcol0"> 
          <a href="<?php echo absurl($case[1]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($case[1]['Imgurl']); ?>"></a> 
        </div>
        
        <div class="col-xs-6 col3 hsmcol0"> 
          <a href="<?php echo absurl($case[2]['Adurl']); ?>"> <img class="img100pw img100ph" src="<?php echo absurl($case[2]['Imgurl']); ?>"></a> 
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>