<?php
	namespace Home\Controller;
	use Think\Controller;
	class LoginController extends Controller
	{
		public function index()
		{
		$this->display();
		}

		public function do_login()
		{
			if ($_SESSION['verify'] !== md5($_POST['code'])) 
			{
				$this->error("yanzhengma cuowu");
			}
		}
	}

	?>