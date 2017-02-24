<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    //	$mysql =new \Home\Model\IdModel();
   		//$mysql =new Model(); --->无法使用？
   		$mysql = M('id');
   	//	$mysql =new \Think\Model();
/*		$result = $mysql->find();
		//参数并没有用？？
		var_dump($result);
		echo "<br/>";
		$result = $mysql->where('xuehao = 71114223 and yikatong = 223')->getfield('mark');
		var_dump($result);
		$mysql->xuehao = "71114231";
		$mysql->yikatong ="230";
		$mysql -> qQueue = "32145";
		$mysql -> aQueue ="DDDDD";
		echo $mysql ->add();	
		//返回值是新增ID号

*/
		//$data['xuehao'] = '71114223';
	//	$data['mark'] =97;
	//	echo $mysql->where('mark = 99')->save($data);
		$this -> display();
	    }

	    public function search()
	    {
	    	$mysql =M('id');
	    	$toSearch['yikatong'] = $_POST['yikatong'];
	    	$toSearch['xuehao'] =$_POST['xuehao'];
	    	$arr = $mysql ->where($toSearch)->select();
	    	var_dump($arr);
	    	$arr = $mysql -> order(array("xuehao"=>"asc","mark"=>"asc"))->limit("3,3")->field("mark as 成绩,xuehao as 学号")->select();
	    	$this ->show("<br></br>");
	    	dump($arr);
	    	$this->assign('result',$arr);

	   // 	$this->display('index');//否则会返回“search.html模板”
	    	//不能用isset 来作为POST是否被设置的条件，即使你没有填号码
	    	//所以用 POST != NULL
	    }


}


