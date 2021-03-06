<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-getOrderInfo.css" />
</head>

<body>
	<!--head-->
	<div class="top">
		<div class="py-container">
			<div class="shortcut">
				    <ul class="fl">
                        @if(!session('user_id'))
                            <li class="f-item">请<a href="{{url('/login')}}" target="_blank">登录</a>　<span><a href="{{url('/reg')}}" target="_blank">免费注册</a></span></li>
                                @else
                            <span>欢迎{{session('user_name')}}登录</span></li> <span><a href="{{url('/logout')}}" target="_blank">切换账号</a></span></ul>
                        @endif</ul>
				<ul class="fr">
					<li class="f-item">我的订单</li>
					<li class="f-item space"></li>
					<li class="f-item">我的品优购</li>
					<li class="f-item space"></li>
					<li class="f-item">品优购会员</li>
					<li class="f-item space"></li>
					<li class="f-item">企业采购</li>
					<li class="f-item space"></li>
					<li class="f-item">关注品优购</li>
					<li class="f-item space"></li>
					<li class="f-item">客户服务</li>
					<li class="f-item space"></li>
					<li class="f-item">网站导航</li>
				</ul>
			</div>
		</div>
	</div>
		<form action="/order" method="post">
		<input type="hidden" name="address_id">
		<input type="hidden" name="pay_type">
		<input type="hidden" name="allprice">
		<input type="hidden" name="deal_price">
		<input type="hidden" name="cartadd" value="{{$cartadd}}">


	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">结算页</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--主内容-->
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
							@foreach($zxp as $k=>$vv)
							  <div>
								<div class="con name"><a href="javascript:;" address_id="{{$vv->address_id}}" >{{$vv->consignee}}<span title="点击取消选择">&nbsp;</a></div>
								<div class="con address">{{$vv->consignee}}   {{$vv->country}}{{$vv->province}}{{$vv->city}}{{$vv->district}} <span>{{$vv->tel}}</span>
									<span class="base">默认地址</span>
									<span class="edittext"><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span>
								</div>
								<div class="clearfix"></div>
							  </div>
							  @endforeach
							</li>
							
							
						</ul>
						
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li value="1">微信付款<span title="点击取消选择"></span></li>
							<li value="2">在线支付<span title="点击取消选择"></span></li>
							<li value="3">支付宝<span title="点击取消选择"></span></li>
							<li value="4">货到付款<span title="点击取消选择"></span></li>
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							<li>
								
								<div class="sendGoods">

									@foreach($cart as $k=>$v)

									<ul class="yui3-g">
										<li class="yui3-u-1-6">
											<span><img src="{{$v->goods_thumb}}"/></span>
										</li>
										<li class="yui3-u-7-12">
										<div class="item-msg">{{$v->goods_name}}<br>
											@if(isset($v['goods_attr']))
												@foreach($v['goods_attr'] as $vv)
													{{$vv['attr_name']}}:{{$vv['attr_value']}}
												@endforeach
											@endif
										</div>
											<div class="seven">7天无理由退货</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">{{$v->shop_price}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X1</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit">有货</div>
										</li>
									</ul>
									@endforeach

								</div>
							</li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">

					<span><i class="number">{{$count}}</i>件商品，总商品金额</span>
					<em class="allprice">¥{{$price[0]->total}}</em>
				</div>
				<div class="list">
					<span>返现：</span>
					<em class="money">0.00</em>
				</div>
				<div class="list">
					<span>运费：</span>
					<em class="transport">0.00</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="deal_price">¥¥{{$price[0]->total}}</span></div>
			<div class="fc-receiverInfo">寄送至:北京市海淀区三环内 中关村软件园9号楼 收货人：某某某 159****3201</div>
		</div>
		<div class="submit">
			<button class="sui-btn btn-danger btn-xlarge" type="submit">提交订单</button>
		</div>
	</div>
	</form>
	<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="{{url('/store')}}" method="get" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" name="consignee" class="input-medium">
									    </div>
									  </div>
									
                                    <div class="control-group">
											<label class="control-label">所在地区：</label>
											<div class="controls">
												<tr>
													<td colspan="3" align="left" bgcolor="#ffffff">
														<select name="country" id="selCountries_0">
															<option value="0">请选择国家</option>
															@foreach($region as $v)
																<option value="{{$v->region_id}}">{{$v->region_name}}</option>
															@endforeach
														</select>

														<select name="province" id="selProvinces_0">
															<option value="0">请选择省</option>
														</select>
														<select name="city" id="selCities_0">
															<option value="0">请选择市</option>
														</select>
														<select name="district" id="selDistricts_0">
															<option value="0">请选择区/县</option>
														</select>(必填) </td>
												</tr>
											</div>
										</div>
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" name="address" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" name="tel" class="input-medium">
									    </div>
									  </div>


									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="text" name="email" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" name="zipcode" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  <div class="modal-footer">
						        <!-- <button type="submit" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button> -->
                                <input type="submit" class="sui-btn btn-primary btn-large" value="确定">
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						      	</form>
						      	
						    
						      </div>
						      
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
	<!-- 底部栏位 -->
	<!--页面底部-->
<div class="clearfix footer">
	<div class="py-container">
		<div class="footlink">
			<div class="Mod-service">
				<ul class="Mod-Service-list">
					<li class="grid-service-item intro  intro1">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro2">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro  intro3">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro4">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro intro5">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
				</ul>
			</div>
			<div class="clearfix Mod-list">
				<div class="yui3-g">
					<div class="yui3-u-1-6">
						<h4>购物指南</h4>
						<ul class="unstyled">
							<li>购物流程</li>
							<li>会员介绍</li>
							<li>生活旅行/团购</li>
							<li>常见问题</li>
							<li>购物指南</li>
						</ul>

					</div>
					<div class="yui3-u-1-6">
						<h4>配送方式</h4>
						<ul class="unstyled">
							<li>上门自提</li>
							<li>211限时达</li>
							<li>配送服务查询</li>
							<li>配送费收取标准</li>
							<li>海外配送</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>支付方式</h4>
						<ul class="unstyled">
							<li>货到付款</li>
							<li>在线支付</li>
							<li>分期付款</li>
							<li>邮局汇款</li>
							<li>公司转账</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>售后服务</h4>
						<ul class="unstyled">
							<li>售后政策</li>
							<li>价格保护</li>
							<li>退款说明</li>
							<li>返修/退换货</li>
							<li>取消订单</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>特色服务</h4>
						<ul class="unstyled">
							<li>夺宝岛</li>
							<li>DIY装机</li>
							<li>延保服务</li>
							<li>品优购E卡</li>
							<li>品优购通信</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>帮助中心</h4>
						<img src="/static/img/wx_cz.jpg">
					</div>
				</div>
			</div>
			<div class="Mod-copyright">
				<ul class="helpLink">
					<li>关于我们<span class="space"></span></li>
					<li>联系我们<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>商家入驻<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们</li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->

<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<!-- <script type="text/javascript" src="components/ui-modules/nav/nav-portal-top.js"></script> -->
<script type="text/javascript" src="/static/js/pages/getOrderInfo.js"></script>
</body>
<script scr="static/jquery.min.js"></script>
<script type="text/javascript">
	@if(!count($address))
	$(function(){
		$('.sui-modal').addClass('in');
		$('.sui-modal').css('margin-top','-201px');
		$('sui-modal-backdrop').show();
		$('.sui-modal').show();
	});
	@endif

	$('select').change(function(){
		var _this = $(this);
		var region_id = _this.val();
		if(region_id<1){
			_this.nextAll().find('option:gt(0)').remove();
		}
		$.get('/getsondata',{region_id:region_id},function(res){
			if(res.code=='0'){
				var address = res.data;
				// alert(address);
				var str = '<option value="0">--请选择--</option>';
				for (var i=0;i<address.length;i++) {
					str += '<option value="'+address[i].region_id+'">'+address[i].region_name+'</option>';
				}
				_this.next().html(str);
			}
			return;
		},'json');
	});
	 $(function(){
		$('.name:eq(0)').addClass('selected');
		 var address_id = $(".name").find('a').attr('address_id');
		//  var_dump(address_id);
    	$('input[name="address_id"]').val(address_id);
    	$('.payType li:eq(0)').addClass('selected');
		var pay_type = $('.payType li:eq(0)').val();
		 $('input[name="pay_type"]').val(pay_type);
		 var allprice = $('.allprice').html();
		 allprice = allprice.substr(1);
		//  alert(allprice);
		 $('input[name="allprice"]').val(allprice);
		  var deal_price = $('.deal_price').html();
		 deal_price = deal_price.substr(2);
		//  alert(deal_price);
		 $('input[name="deal_price"]').val(deal_price);


       });
	   $(function(){
	$(".address").hover(function(){
		$(this).addClass("address-hover");	
	},function(){
		$(this).removeClass("address-hover");	
	});
})

$(function(){
	$(".name").click(function(){
		var _this = $(this);
        var address_id = _this.find('a').attr('address_id');
    	_this.addClass('selected');
    	_this.parent().siblings().find('.name').removeClass('selected');
    	$('input[name="address_id"]').val(address_id);
	});
	$(".payType li").click(function(){
		 $(this).addClass('selected');
		 $(this).siblings().removeClass('selected');
		 var pay_type = $(this).val();
		 $('input[name="pay_type"]').val(pay_type);
	});
})
</script>
</html>