<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	private $pictureNumber = 2;//最大图片张数
	private $pictureRangeMax = 133;//最大图片像素的三分之二
	private $prefixURL = './Public/check/';//验证码图片储存位置
	public function index()
	{
        session('tokenLogin',NULL);

		srand(microtime(true) * 1000);
		$pNumber = rand(1,$this->pictureNumber);
		$left = rand(0,$this->pictureRangeMax);
		$up = rand (0,$this->pictureRangeMax);
		//生成随机数.

		$data = md5($pNumber.$left.$up);
		$toAssign['cutURL'] = 'tmp/cut'.$data.'.jpg';
		$toAssign['coverURL'] = 'tmp/cover'.$data.'.jpg';

		if(!is_file($this->prefixURL.'tmp/cut'.$data.'.jpg'))
        {
			$image = new\Think\Image();
			$imageURL =$this->prefixURL.'check_'.$pNumber.'.jpg';		
			$image->open($imageURL);
			$image->crop(70,70,$left,$up)->save($this->prefixURL.$toAssign['cutURL']);
			$image ->open($imageURL) ->water('./Public/check/cover.jpg',array($left,$up),100)->save($this->prefixURL.$toAssign['coverURL']);
			$this->assign('test',$imageURL);	
		}
        session('left',$left);
        session('up',$up);
		$this ->assign($toAssign);

		//$this -> display();
		//一小时后删除图像
		$this->display();
	}
}


