<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller
{

    public function clear()
    {
		$memcache_obj = memcache_connect('memcache_host', 11211);
		memcache_flush($memcache_obj);
	}

	public function initial()
	{
        $save['time'] = -1;//储存时间戳
        $user = M("User");
        $user->where('stuid=1')->save($save);
	}
}