## 项目经验
- *适中原则*: 不要过分追求超过自己水平的技术,不要过分追求超过自己的项目的大小和需求的技术:
	- 浪费太多时间在学习上，并且超过自己的目前能力，导致掌握不深，还会浪费很多时间，需要一步步不断精进才能扎实
	- 本次项目用了thinkphp框架，实际上真正的代码却没有多少，虽然不难，但是需要花很多时间学习，这不得不说是一件本末倒置的事情
- *应对高并发的设计*:
- *账户安全性设计*：
	- 登陆令牌，每次接到相同的token之后，刷新session，使得用户不能进行多次点击登陆， 	
## 语言使用经验
- *字符串中使用变量*：
	- 用单引号括住的输出，并没有解析字符串变量，而使用双引号括住的输出，则解析了变量了，输出变量的值。
	```
- *安装memcache扩展*：
	- http://blog.csdn.net/liujan511536/article/details/46523807
- *thinkphp跨域访问*：
	- http://www.cnblogs.com/cbread/p/5450630.html
eg.
echo 'Welcome to visit $website. My name is $name.';
echo '<br>';
echo "Welcome to visit $website. My name is $name.";
output:
Welcome to visit $website. My name is $name.
Welcome to visit NowaMagic. My name is Gonn.
	```
	- 如果涉及到字典键值对,需要使用 {} 包含其中具有"" 的部分：
	```
$temp = array("one" => 1, "two" => 2);   
echo "The first element is {$temp["one"]}.";  
	```
## 项目逻辑：
- 时间计算逻辑：
	- 比赛开始的时候，管理员调用时间初始化接口，这个接口可以使得每个用户的时间戳被统一初始化为指定时间
	- 