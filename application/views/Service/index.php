<?php $this->load->view('header'); ?>
<!--服务-->

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <h1>服务与支持</h1>
    </div>
    <div class="line"></div>
    <ul class="service-list">
      <li class="s_1"> <a href="<?php echo makeurl('Service','Faq'); ?>">常见问题</a> </li>
      <li class="s_2"> <a href="<?php echo makeurl('Service','Map',-1); ?>">服务网点</a> </li>
      <li class="s_3"> <a href="<?php echo makeurl('Service','StopProduct'); ?>">停产产品查询</a> </li>
      <li class="s_4"> <a href="<?php echo makeurl('Service','Policy'); ?>">产品保修政策</a> </li>
    </ul>
    <div class="service-btns"> 
    <a target="view_frame" href="http://webchat.ruijie.com.cn/live800/chatClient/chatbox.jsp?companyID=8933&configID=7&skillId=1&k=1" class="online" onClick="OnlickService();">在线客服</a> 
    <a href="tel:4008-111-000" class="hot-line">服务热线</a> </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
