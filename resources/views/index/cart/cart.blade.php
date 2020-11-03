<!DOCTYPE html>
<html>
                                    
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-cart.css" />
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
                            <span>欢迎{{session('user_name')}}登录</span></li> <span><a href="{{url('/login')}}" target="_blank">切换账号</a></span></ul>
                        @endif</ul>
                    <ul class="fr">
                        <li class="f-item"><a href="/myorder">我的订单</a>----
                        <li class="f-item" id="service">
                            <span><a href="/yqc">客户服务</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">购物车</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span>20</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" name="checkbox1" id="" value="" /> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<div class="cart-body">
					@foreach($cart as $k=>$v)
						<div class="cart-list">
							<ul class="goods-list yui3-g">
								<li class="yui3-u-1-24">
									<span><input type="checkbox" name="checkbox2"  class="cartid" id="" value="{{$v->cart_id}}" /></span>
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img src="{{$v->goods_thumb}}" /></div>
										<div class="item-msg">{{$v->goods_name}}<br>
											@if(isset($v['goods_attr']))
												@foreach($v['goods_attr'] as $vv)
													{{$vv['attr_name']}}:{{$vv['attr_value']}}
												@endforeach
											@endif
										</div>
									</div>
								</li>
								
								<li class="yui3-u-1-8"><span class="price">原价￥{{$v->shop_price}} <br><font color="red">降价￥{{$v['market_price']}}</span></font></li>
								<input type="hidden" class="cart_id" value="{{$v['cart_id']}}">
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="increment mins" id="mins">-</a>
									<input autocomplete="off" type="text" id="itxt" value="{{$v->buy_number}}" minnum="{{$v->buy_number}}" class="itxt" />
									<a href="javascript:void(0)" class="increment plus" id="plus">+</a>			
							</ul>

							<a href="javascript:void(0)" id="zxp" >删除选中的商品</a>
						</div>
					@endforeach
					</div>
				</div>
			</div>
			<div class="cart-tool">
				<div class="toolbar">
					<div class="chosed">已选择<span>11</span>件商品</div>
					<div class="sumprice">
						<div class="summary-wrap">
                        <div class="fl title">
                            <i>优惠券</i>
                        </div>
                         @foreach($pss as $k=>$v)
                           <font color="red"><i class="red-bg" id="{{$v->act_id}}" title="{{$v->act_name}}">{{$v->act_name}}</i></font> 
                            <input type="hidden" name="{{$v->act_id}}" id="{{$v->act_id}}">
                           @endforeach
                    </div>
						<span><em>总价（不含运费） ：</em><i class="summoney">¥0.00</i></span>
								@foreach($ps as $k=>$v)
						<span><em>已节省：</em> <i>-¥<font color="red">{{$v->min_amount}}元</i></font> </span>
						@endforeach
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:void(0)">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">推荐商品</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										@foreach($cnm as $k=>$v)
										<li>
											<a href="item/{{$v->goods_id}}" ><img src="{{$v['goods_img']}}" width="165" height="500" alt="" /></a>
											<div class="intro">
												<i>{{$v->goods_name}}</i>
											</div>
											<div class="money">
												<span>${{$v->shop_price}}</span>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
<script type="text/javascript" src="/static/js/widget/nav.js"></script>
</body>
</html>
<script scr="/static/jqery.min.js"></script>
<script>
	$('.cartid').click(function(){
		var cart_id = new Array();
		$('.cartid:checked').each(function(){
			cart_id.push($(this).val());
		})
		if(cart_id.length){
			$.get('/getcartprice',{cart_id:cart_id},function(res){
				if(res.code == '80000'){
					$('.summoney').text(res.data);
				}
			},'json')
		}
	})
	$('.sum-btn').click(function(){
		var cart_id = new Array();
		$('.cartid:checked').each(function(){
			cart_id.push($(this).val());
		});
		if(!cart_id.length){
			alert('选择购买的商品');
			return; 
		}
		location.href="/confrimorder?cart_id="+cart_id;
	})

	 $(document).on('click','#zxp',function (){
 		var cart_id = $('.cart_id').val();
 		if(confirm('确认删除此商品？')){
			$.get('/destroy/'+cart_id,function(result){
				if(result.code=='0000'){
					location.reload();
				}
			},'json');
		}
	});
	 $(document).on('click','input[name="checkbox1"]',function (){
    var _this = $(this);
    if(_this.prop('checked') == true){
        $('input[name="checkbox2"]').prop('checked',true);
    }else{
        $('input[name="checkbox2"]').prop('checked',false);
    }

});


	 
 $(document).on('click','.plus',function (){
 		var buy_number = $(this).prev().val();
 		var buy_number =parseInt(buy_number)+1
 		$(this).prev().val(buy_number);
 })


 $(document).on('click','.mins',function (){
 		var buy_number = $(this).next().val();
 		var buy_number =parseInt(buy_number)-1
 		
 		if(buy_number<=0){
 			alert('不能再减了宝贝！！！');
 		}else{
 			$(this).next().val(buy_number);
 		}
   		
 })

 $(document).on('blur','.itxt',function (){
		var buy_number = $(this).val();
 		if(buy_number<1){
 			alert('最少只能买一个');
 		}else{
 			buy_number = $(this).val(buy_number);
 		}
});	

</script>