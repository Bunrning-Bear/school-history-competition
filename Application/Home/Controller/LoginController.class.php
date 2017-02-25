<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
    public function toLogin()
    {
        $toReturn = array(
            "result" => 0,//0代表登录失败，1代表登录成功，2代表进入进一步登录判断状态 3代表答题已经结束
            "output" => "非法登陆",
            "timeUsed" => 0,
        );
        if(I("session.tokenLogin")==I("post.tokenLogin"))
        {
            session("tokenLogin",time());//判断语句结束后，马上改变令牌
            $toReturn['tokenLogin'] = I("session.tokenLogin");
            $user = D('User');
            if (I("session.verifyResult") == 1) //否则未不经过验证码而登录
            {
                if ($user->create()) {//进行自动验证
                    $where = array
                    (
                        "xuehao" => I('post.xuehao'),//'71114223',
                        "yikatong" => I('post.yikatong'),
                    );
                    $find = $user->where($where)->field('stuid,time,mark,qqueue,aqueue')->find();
                    // $toReturn['output'] =$user->getLastSql();
                    // $queSql = $queue->where('queue_id='.$find['stuid']);
                    if ($find > 0) {//匹配成功
                        #$toReturn['output'] = urlencode("匹配成功");
                        if ($find['mark'] == -1)
                        {//是否已经结束答题
                            // $toReturn['output'] = urlencode("匹配成功２");
                            $hasLogin = F($find['stuid']);
                            //记录成绩
                            $_SESSION['stuID'] = $find['stuid'];
                            $_SESSION['time'] = $find['time'];
                            $_SESSION['qqueue'] = $find['qqueue'];
                            $_SESSION['aqueue'] = $find['aqueue'];
                            // $toReturn['output'] = urlencode("匹配成功3");
                            if ($hasLogin != NULL) {//该用户重复登录过
                                $toReturn['result'] = 2;
                                $toReturn['tokenLogin'] = I("post.tokenLogin");
                                $toReturn['output']=urlencode("重复登陆");
                            } else {
                                $toReturn['result'] = 1;
                                F($find['stuid'], session_id());
                                $toReturn['output']=urlencode("没有重复登陆");
                            }
                        } else {
                            $toReturn['result'] = 3;
                            $toReturn['mark'] = $find['mark'];
                        }
                    } else {
                        $toReturn['output'] = urlencode("用户名密码不匹配");

                    }
                } else {
                    $toReturn['output'] = urlencode($user->getError());
                }
            }
                $toReturn['tokenLogin'] = I("session.tokenLogin");

            session("loginResult",$toReturn['result']);
            session_write_close();
        }
        else
        {
            $toReturn['output'] = urlencode("服务器正在处理，无需重复点击登录按钮");
        }
        $this->ajaxReturn($toReturn);
    }

public function judgeStatue()
{
    $loginResult = I("session.loginResult");
    $time = I("session.time");
    $stuID = I("session.stuID");
    $qqueue= I("session.qqueue");
    $toReturn['tokenLogin'] = I("session.tokenLogin");
    //如果是重复登录的，需要更新密钥
    if($loginResult == 2)
    {
        F($stuID,session_id());
    }
    if($loginResult == 1 || $loginResult == 2)
    {
        $question = array();
        $ch = array
        (
            'a' => array(),
            'b' => array(),
            'c' => array(),
            'd' => array(),
        );

        $queCon = A('question');
        $queCon->getQuestion($qqueue, $question, $ch['a'], $ch['b'], $ch['c'], $ch['d']);
        $toReturn['question'] =$question;
        $toReturn['choiceA'] = $ch['a'];
        $toReturn['choiceB'] = $ch['b'];
        $toReturn['choiceC'] = $ch['c'];
        $toReturn['choiceD'] = $ch['d'];
        if ($time == -1)
        {
            $save['time'] = time();//储存时间戳
            $toReturn['timeUsed'] = 0;// 返回已用时间
            $condition['stuID'] = $stuID;
            $user = M("User");
            $user->where($condition)->field("time")->save($save);
        }
        else
        {
            $toReturn['result'] = 1;//登录成功
            $toReturn['timeUsed'] = time() - $time;//记录登录时间
        }
    }
/* 将题目储存到COOKIE的版本
        if ($time != -1)//正确数据应该是 time==-1 时为未开始答题
        {//登录成功，未开始答题
            $toReturn['result'] = 1;//判断登录成功
        //获取题目信息:
            $question = array();
            $ch = array
            (
                'a' => array(),
                'b' => array(),
                'c' => array(),
                'd' => array(),
            );

            $queCon = A('Question');
            $queCon->getQuestion($qqueue, $question, $ch['a'], $ch['b'], $ch['c'], $ch['d']);
            //获取题目储存到$question
            //选项储存到$ch;
            //把题目信息储存到cookie
            cookie("question",$question);
            cookie("cA",$ch['a']);
            cookie("cB",$ch['b']);
            cookie("cC",$ch['c']);
            cookie("cD",$ch['d']);
            $save['time'] = time();//储存时间戳
            $toReturn['timeUsed'] = 0;// 返回已用时间
            $condition['stuID'] = $stuID;
            $user = M("User");
            $user->where($condition)->field("time")->save($save);
        } else
        {
            //未答完题;
            $toReturn['result'] = 1;//登录成功
            $toReturn['timeUsed'] = time() - $time;//记录登录时间
        }
        $toReturn['question'] =cookie("question");
        $toReturn['choiceA'] = cookie("cA");
        $toReturn['choiceB'] = cookie("cB");
        $toReturn['choiceC'] = cookie("cC");
        $toReturn['choiceD'] = cookie("cD");
    }
*/
    $this->ajaxReturn($toReturn);
}

    public function Logoff()
    {
        F(session("stuID"),NULL);
        session('[destroy]');
     //   cookie(null);
        $this->redirect("Check/index");
    }
}
//注销登录

?>