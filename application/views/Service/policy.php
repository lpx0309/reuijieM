<?php $this->load->view('header'); ?>

<div class="container content-wrap">
  <div class="content-inner">
    <div class="contai">
      <div class="management-list">
        <ul>
          <li style="list-style:none  !important">
            <p><a><?php echo msicut($detail['Name']); ?></a></p>
            <p><span>时间：<?php echo date('Y-m-d',strtotime($detail['AddTime'])); ?></span></p>
            <p><span>点击量：<?php echo $detail['CallNum']; ?></span></p>
            <!--<div id="share" class="share"> 
              <a href="javascript:;"><img src="<?php echo $this->config->base_url(); ?>public/images/btn-share.png" id="share_btn"></a> 
            </div>-->
          </li>
        </ul>
      </div>
    </div>
    <div class="line"></div>
    
    <?php $this->load->view('share'); ?>
    
    <div class="contai">
      <div class="normal-detail">
        <?php //echo maketext($detail['HtmlContent']); ?>
        
        <div class="myStyle">
            <p style="margin-left: 40px">
                <span style="font-size: 14px"><strong>一、保修定义</strong></span></p>
            <p style="margin-left: 40px">
                保修是为了保证产品的功能完整性而对故障产品进行的维修或者更换、RGOS软件升级。</p>
            <p style="margin-left: 40px">
                保修是修复产品缺陷或替换缺陷产品的有限责任，服务持续时间和内容均处于有限责任范围。</p>
            <p style="margin-left: 40px">
                客户设备处于保修期内和保修范围的产品保修免费。</p>
            <p style="margin-left: 40px">
                <span style="font-size: 14px"><strong>二、现行锐捷网络标准保修内容</strong></span></p>
            <p style="margin-left: 40px">
                保修及保修拓展条款内容包括：</p>
            <p style="margin-left: 40px">
                1、硬件：主机（含模块）保修一年。在产品使用说明书规定环境及状态下，排除其它相关设备及网络故障等引发因素后的产品缺陷或功能异常，可判定为硬件故障。</p>
            <p style="margin-left: 40px">
                2、软件：保修一年。保证光盘无缺陷，否则由锐捷网络更换；保证软件基本符合公开发布的软件功能标准。</p>
            <p style="margin-left: 40px">
                3、保修扩展条款：</p>
            <p style="margin-left: 40px">
                1）免费提供可供客户自行升级的RGNOS升级软件；</p>
            <p style="margin-left: 40px">
                2）免费提供1年应用软件的小版本升级软件；</p>
            <p style="margin-left: 40px">
                3）承诺保修提供方式为客户送修或寄修，15日内快速处理；</p>
            <p style="margin-left: 40px">
                4）随机附送光盘或其他介质不能读取，从购机之日起15日内可免费更换；</p>
            <p style="margin-left: 40px">
                5）7天&times;24小时可获取4008-111-000远程支持中心技术支持；</p>
            <p style="margin-left: 40px">
                6）免费开放锐捷远程知识平台。</p>
            <p style="margin-left: 40px">
                4、附件：产品随机附件、资料，如连接线、电源线、光盘、软盘、说明书等均不在保修范围之列。</p>
            <p style="margin-left: 40px">
                <span style="font-size: 14px"><strong>三、保修免责条款</strong></span></p>
            <p style="margin-left: 40px">
                1、保修是产品有限责任，过保有两种类型：过保修期和非保修范围。</p>
            <p style="margin-left: 40px">
                2、过保修期指产品保修期届满，免费保修服务自动失效。</p>
            <p style="margin-left: 40px">
                3、非保修范围指使用中有不当行为或过错导致设备免费保修服务自动失效。</p>
            <p style="margin-left: 40px">
                下列情况属于非保修范围：</p>
            <p style="margin-left: 40px">
                1）用户有责任提供有效保修凭证，无法出示有效保修凭证或产品条码损坏不予保修；</p>
            <p style="margin-left: 40px">
                2）以产品条码为保修起始时间依据时，非指定维修机构认定的保修无效；</p>
            <p style="margin-left: 40px">
                3）保修凭证与产品不符或有虚假记录时；</p>
            <p style="margin-left: 40px">
                4）未经厂家授权而对产品进行拆卸、修理、改装而造成故障；</p>
            <p style="margin-left: 40px">
                5）由购买方非正常运输、装卸、使用、维护、保管等原因造成故障。如：雷击、过压过流、 进水等；</p>
            <p style="margin-left: 40px">
                6）由于不可抵抗力造成故障；</p>
            <p style="margin-left: 40px">
                7）若产品停产，保修及服务支持仅限于宣布停产之后的5年。</p>
            <p style="margin-left: 40px">
                <span style="font-size: 14px"><strong>四、保修期界定</strong></span></p>
            <p style="margin-left: 40px">
                有效保修凭证：</p>
            <p style="margin-left: 40px">
                包含：1、产品保修卡 2、有效购机发票&nbsp; 3、产品条形码&nbsp; 4、合法购销合同/包装。</p>
            <p style="margin-left: 40px">
                1）产品保修卡必须包含：经销商名称、产品名称、型号、产品机号、购买日期；</p>
            <p style="margin-left: 40px">
                2）有效购机发票：带有税务印章的正规商业销售发票；</p>
            <p style="margin-left: 40px">
                3）产品条形码：清晰完整，无修改痕迹；</p>
            <p style="margin-left: 40px">
                4）经锐捷认定的合法购销合同、产品包装物中另行规定的保修条款有效，客户需主动出示。</p>
            <p style="margin-left: 40px">
                保修期计算：</p>
            <p style="margin-left: 40px">
                1、保修期开始是指：</p>
            <p style="margin-left: 40px">
                1）购买时包含有效信息的保修卡上标注日期；</p>
            <p style="margin-left: 40px">
                2）可证实的购机发票日期；</p>
            <p style="margin-left: 40px">
                3）无法提供以上（1）（2）有效保修凭证，则保修截止于产品条形码标明的出厂日期15个月后；</p>
            <p style="margin-left: 40px">
                4）合法购销合同标明的保修期限。</p>
            <p style="margin-left: 40px">
                2、维修或更换后的产品，质量保证三个月；若原保修期剩余超过三个月，则以原保修期为准。</p>
            <p style="margin-left: 40px">
                3、除产品条形码推算保修法外，当多个保修凭证同时有效时，将按照最有利于客户利益的凭证进行保修。</p>
            <p style="margin-left: 40px">
                <span style="font-size: 14px"><strong>五、开箱不合格（</strong><strong>DOA</strong><strong>，</strong><strong>Dead On Arrival) </strong><strong>更换</strong></span></p>
            <p style="margin-left: 40px">
                锐捷网络承诺开箱不合格产品从保修开始日起30天之内予以全新包装更换。</p>
            <p style="margin-left: 40px">
                1、DOA范围包含开箱外观损坏、附件短少以及开箱运行30日内的硬件故障。</p>
            <p style="margin-left: 40px">
                2、DOA更换需要附件、包装齐全（以装箱清单为准）,否则不满足包换承诺条件，按维修服务标准处理。</p>
            <p style="margin-left: 40px">
                3、附件短少的产品，可由锐捷技术服务中心免费提供。</p>
        </div>        
        
        
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('footer'); ?>


