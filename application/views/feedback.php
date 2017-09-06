<?php $this->load->view('header'); ?>
<!--反馈-->

<div class="container content-wrap inpro">
  <div class="content-inner">
    <div class="contai">
      <h1>在线反馈</h1>
    </div>
    <div class="line"></div>
    <div class="contai">
      <div class="row inpro-imgbox">
        <form method="post" action="<?php echo makeurl('FeedBack'); ?>">
          <input name="name" value="<?php echo $name; ?>" type="text" class="sinput" style="display: block; margin-left:10%;margin-top: 0.8rem;border: 1px solid #dedede;" placeholder="姓名">
          <div style="clear: both;"></div>
          <span style="color: red; display: block;margin-top: 0.2rem;font-size: 1rem;margin-left: 10%;"></span>
          <input name="mail" value="<?php echo $mail; ?>" type="text" class="sinput" style="display: block; margin-left:10%;margin-top: 0.8rem;border: 1px solid #dedede;" placeholder="邮箱">
          <div style="clear: both;"></div>
          <span style="color: red; display: <?php echo $mail_vali; ?>;margin-top: 0.2rem;font-size: 1rem;margin-left: 10%;">
          <ul class="errorMessage">
            <li><span>邮箱格式不正确</span></li>
          </ul>
          </span>
          <input name="tel" value="<?php echo $tel; ?>" type="text" class="sinput" style="display: block; margin-left:10%;margin-top: 0.8rem;border: 1px solid #dedede;" placeholder="手机号码">
          <div style="clear: both;"></div>
          <span style="color: red; display: <?php echo $tel_vali; ?>;margin-top: 0.2rem;font-size: 1rem;margin-left: 10%;">
          <ul class="errorMessage">
            <li><span>手机格式不正确</span></li>
          </ul>
          </span>
          <textarea name="content" class="sinput" style="display: block; margin-left:10%;margin-top: 0.8rem;border: 1px solid #dedede; height: 10rem;" placeholder="问题描述"><?php echo $content; ?></textarea>
          <div style="clear: both;"></div>
          <span style="color: red; display: <?php echo $content_vali; ?>;margin-top: 0.2rem;font-size: 1rem;margin-left: 10%;">
          <ul class="errorMessage">
            <li><span>问题描述不能为空</span></li>
          </ul>
          </span>
          <input type="submit" class="sbutton" value="提交" style="display: block; margin-left: 40%; background: #dc0031; color: white; font-size:1.8rem;margin-top: 0.8rem;">
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
