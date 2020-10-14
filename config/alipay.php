<?php
return [
		//应用ID,您的APPID。
		'app_id' => "2016101900723546",

		//商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAlRB1s9YsOlv5PN2T8HaS740l1der10tzG+IQiMGnuFNZ9uNmB9FFz63R8M/UhvFsXxFAbPKFOsrx2dHkoWp4LOnYOlyF5Y5Ysia9jXDeyK1ZPPwe92sUjJliHM4IprSQSQKBGl/iISOR6ojp5KwR8mttxiWCB8PD9bEbbhqO6ZBUeGHiU0WnvpyKgcMS8B46pw8bcAByK2sJA66Fwm0lkVa2X7MNI1XVNyDIKd3G3CACkMds9ylqh2ELHH7+teeLOXLnWyDE31DLMdvZfbdBnwRPMwITG9algCz+9by6+jDOO8wtB4mCtDugYIkj0yKL3Gl3Qy4IKt+Zepz6DnXZ/QIDAQABAoIBACp4NhC2xIMcETa2KqAoKFT38f+rItqENJeNIQjVo+NwXAFraHZxuWIiM95YWETaI/YyBBkGP88wYxecJXeXzgV92o1GLx/oHn0jbH4P2mlyeipV6ryzVXd5e+qZCP32E+W5QO8ywkqOx9P6jikInVRkJzJ9HT75F6u4egg0qOMCO9TV/Xvn+gdebFuB9yPRoxNyAJbXdg/AKp/wT131OoXOcoUnmE/+op8RACb6WN8NSHY7/k5ASpMT2XsCYGYA0anUI3t8WVMj6xAwyIM7Xba6jW6BevBU11KLHLzjcnSr1x57ThBhORRMq9ytCZwGdzq1TgmmILOZh/bdNnHepAECgYEA3gVAkaL/dgZxceXhzUpt/U20lcLZAeHLSOcnPGSqIO1cv8XObSnqtg0d9uwDTmunrEt7T/S2cliL2CK9R7pozwyaUvvsDVFod3FAdB5AL5yogcH1RTTAQwdaSZh/5q1gV/0PH8kATmHaDYPYgp5QnCOi/O11CqkY4OyWqS0vye0CgYEAq+DJwaLRaQIyuQxwCv9J66zcxSvWUNHDzbXvRonKlGStEjEd6gQSdkisLbRi6wnxGsY5L4Pk6zG0x7ipbZlr+91bI597gZjp4ylNLrIc5eNQjsxSNrwYQQbwVSwY3L54HXrPvsU8hBhjw98zSR3JHf3sTuotHL4uUotSQOD8DlECgYA/rOnz2vfBdd+bdv7nzez1tQ+R1CxA6e1Pn1wVahmREAKFzcmCbX8vb1uksdPQ7fdM5uka6WhaKyMQfgYjSEc++rJYEoCE4VBA0W5W30YxYZDChko96v8pOjae3Onx0s/K7H0l9JPt5wqOzb2O2LDt1xqrx77Fq/HCsJgVNSx7kQKBgDEC6IVO6GgJOG2MHmcEZQ/POyT+Wx6wsiT2vERhBmNKUg/d8anJf3o7Pt3Jkmtzak04ORZThfOLOQG6ppWaKjCn7lU6JP3PnOIp5Nhr8dGcAFy35rm06TWhxOaErJJFvfqqCpNbquYADnLMMtOmqrLitX/LRxHrKUpgcBQQE9ABAoGAF+COFsRAKe7xr+3u/6gjcC/ODF2/L4x58LW7/JPxmL0lFgUSDYA9uys+K1Yuo7MrYhcV4flyGZQkW3PQ4zOl8GrHwb5F2HOSGo4L2NPMAvhZ3Vym3QdY0Ur2/nH0Prbj9fVoFooAd/kPXNkH064o02TuBcJq+UJoU6sM/ZQ+tPE=",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.aaa.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
];