<?php $this->load->view('header'); ?>
<!--服务-->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>服务网点</h1>
    </div>
    <div class="line"></div>
    <div class="select-city"> <span>请选择城市</span>
      <div class="select-wrap">
        <select name="" id="" onChange="changeSelection(this.value)">
          <option value="-1" <?php if($id==-1){ ?> selected="selected" <?php } ?>>下拉城市</option>
          <?php
		  if($map){
			  foreach($map as $m){
				  ?>
                  <option value="<?php echo $m['ID']; ?>" <?php if($id==$m['ID']){ ?> selected="selected" <?php } ?>><?php echo msicut($m['Name']); ?></option>
                  <?php
			  }
		  }
		  ?>
        </select>
      </div>
    </div>
    <div class="contai">
      <ul class="addr-list">
        <?php
		if($info){
			foreach($info as $i){
				?>
                <li>
                  <p class="pro">
                  <span><?php echo msicut($i['CITY']); ?></span>
                  <span><?php echo msicut($i['NAME']); ?></span>
                  <span><?php echo msicut($i['TEL']); ?></span></p>
                  <p class="addr"><?php echo msicut($i['ADD']); ?></p>
                  <p class="postcode"><?php echo msicut($i['FAX']); ?></p>
                </li>
                <?php
			}
		}else{
			?>
            <li>
              <p class="pro"><span>北京</span><span>北京技术服务部</span><span>010-52838299</span></p>
              <p class="addr">北京市海淀区翠微路2号院中国印刷科学技术研究所科贸楼院内1层 </p>
              <p class="postcode">010-68154205</p>
            </li>
            <li>
              <p class="pro"><span>北京</span><span>北京维修中心</span><span>010-52838299</span></p>
              <p class="addr">北京市海淀区翠微路2号院中国印刷科学技术研究所科贸楼院内1层 </p>
              <p class="postcode">010-68154205</p>
            </li>
            <li>
              <p class="pro"><span>福州</span><span>福州技术服务部</span><span>0591-83725270</span></p>
              <p class="addr">福州市鼓楼区乌山西路68号阳光乌山荣域B2区103-104室 </p>
              <p class="postcode">0591-83725270</p>
            </li>
        
            <li>
              <p class="pro"><span>福州</span><span>福州维修中心</span><span>0591-87603001</span></p>
              <p class="addr">福州市鼓楼区西洪路528号2号楼5层502室 </p>
              <p class="postcode"></p>
            </li>
            <?php
		}
		?>
      </ul>
    </div>
  </div>
</div>

<script type="text/javascript">
function changeSelection(id){
	window.location=location.href.replace(/(\-\d|\d)+\.html/,id+'.html');
}
</script>

<?php $this->load->view('footer'); ?>
