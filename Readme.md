 **步骤** 

1、需要了解一定的编程知识，本代码PHP实现

2、注册微信公众号平台，进入测试（个人开发者无法发送模版消息，只能借助测试号）
https://mp.weixin.qq.com/debug/cgi-bin/sandboxinfo?action=showinfo&t=sandbox/index

3、新增模版消息配置，内容可参考下面，{{}}里面的变量需要在脚本里声明赋值

4、天气使用的高德天气API，自己注册一下替换掉我的Gaode.php里面的key

https://console.amap.com/dev/key/app

5、一句情话使用的网上随便找的api

6、定时发送需要使用服务器，配置crontab定时任务

 **需要修改的地方** 

1、Main.php里面的template_id需要改成在微信公众测试页面新建的模版的模版Id！！！！

![输入图片说明](%E6%88%AA%E5%B1%8F2022-08-22%20%E4%B8%8A%E5%8D%881.22.16.png)

2、WeiChat.php的APPID、APPSECRET改成微信公众测试页面提供的对应内容！！！

![输入图片说明](%E6%88%AA%E5%B1%8F2022-08-22%20%E4%B8%8A%E5%8D%881.24.16.png)

3、Main.php里面的userList需要改成在微信公众测试页面让女朋友扫完码之后的用户微信号那一栏的内容，想给多个女朋友发就配置多个～～～

![输入图片说明](%E6%88%AA%E5%B1%8F2022-08-22%20%E4%B8%8A%E5%8D%881.21.30.png)

4、纪念日、生日之类的也是Main.php里面改，应该能看到

 **模版消息配置内容:** 

muma～小胖熊
今天是{{date.DATA}}，星期{{week.DATA}}，每天都是超级爱你的一天~

小胖熊现在在{{province.DATA}}{{city.DATA}}
今天天气{{weather.DATA}}，温度{{temperature.DATA}}摄氏度，空气湿度{{humidity.DATA}}%，{{winddirection.DATA}}风{{windpower.DATA}}级，今天也一定要好好爱护自己哦~

今天是我们在一起的第{{togetherDays.DATA}}天，这些日子里都有超级爱你哦~
距离小胖熊的生日还有{{birthDays.DATA}}天，Love You Forever~

{{hua.DATA}}


