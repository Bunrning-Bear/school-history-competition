<?php
namespace Home\Controller;
use Think\Controller;
class QuestionController extends Controller
{

    protected $numSelectMax=20;
    protected $numSelect=20;
    protected $numJudgeMax=20;
    protected $numJudge=20;
    protected $userNumber=3;//学生总数
    protected $questionCount=6;
    // 
    protected $typeAmount = array(20,20);
    protected $questionAmount = array(20,20);
    //获取用户题目随机序列;
    public function toRandom()
    {
        $question = M('questions');

        $this->getQueueByType($resultQueue, $resultAnswer,$question,1);
        //只有管理员用户才有权限进入该控制器；
        $user = M('user');
        $user_id_list = $user->field('stuid')->select();
        // dump($user_id_list);
        $length = count($user_id_list);
        for($i = 0 ; $i < $length ; $i++)
        {
            $id = $user_id_list[$i]['stuid'];
            $resultQueue = '';
            $resultAnswer = '';
            $this->getQueueByType($resultQueue, $resultAnswer,$question,1);
            $this->getQueueByType($resultQueue, $resultAnswer,$question,0);
            $save = array(
                'stuid' => $id,
                'qqueue' =>$resultQueue,
                'aqueue' =>$resultAnswer,
                'mark' =>"-1",
                'time'=>-1
            );
            // dump($save);
            if($user->save($save))
            {
                echo "ID".$id."的学生随机序列生成成功</br>";
                $result = $user->where($save)->find();
                dump($save);
            }
            else{
                 echo "ID".$id." 的学生随机序列生成失败</br>";
            }
        }
    //     { 
    //         
    //         $question = M('questions');
    //         $resultQueue = '';
    //         $resultAnswer = '';
    //         $this->getQueue($this->numSelect,1,$this->numSelectMax, $resultQueue, $resultAnswer,$question);
    //         $this->getQueue($this->numJudge,1 + $this->numSelectMax, $this->numJudgeMax+ $this->numSelectMax,$resultQueue,$resultAnswer,$question);
    //         $save = array(
    //             'stuid' => $i,
    //             'qqueue' =>$resultQueue,
    //             'aqueue' =>$resultAnswer,
    //             'mark' =>"-1",
    //             'time'=>-1
    //         );
    //         dump($save);
    //         if($user->save($save))
    //         {
    //             echo $i."ID 的学生随机序列生成成功</br>";
    //             $result = $user->where($save)->find();
    //             dump($result);
    //         }
    //         dump("i is ".$i);
    //     }
    //     echo "数据初始化完成</br>";
    }

    protected function getQueueByType(&$resultQueue,&$resultAnswer,$question,$type)
    {
        $where['type'] = $type;
        $result = $question -> where($where)->field('q_id,answer')->select();
        //dump($result);
        $amount = $this->questionAmount[$type];
        // 生成有序序列
        $numbers = range (0,$this->typeAmount[$type]-1); 
        //打乱数组
        shuffle ($numbers); 
        // 取数组中的其中一段
        $resultindex = array_slice($numbers,0,$amount);        
        for($j = 0 ; $j <$amount ; $j++)
        {
            //dump($resultindex[$j]);
            $result_unit = $result[$resultindex[$j]];
            $resultQueue = $resultQueue."{$result_unit ['q_id']}"."_";
            $resultAnswer = $resultAnswer."{$result_unit ['answer']}"."_";
            //dump($resultQueue);
            
            // $where = array(
            //     "q_id" =>$result[$j],
            // );
            // //   dump($where);
            // $resultArray = $question -> where($where)->field('answer')->find();
            // $resultAnswer = $resultAnswer.$resultArray['answer'];
        }
        // dump("queue is :".$resultQueue);
        // dump("answer is :".$resultAnswer);
           
    }


    protected function getQueue($num,$numMin,$numMax,&$resultQueue,&$resultAnswer,$question)
    {
        $array = range($numMin, $numMax);
        shuffle($array);
        $result = array_slice($array,0, $num);
        for($j = 0 ; $j < $num ; $j++)
        {
            $resultQueue = $resultQueue."{$result[$j]}"."_";
            $where = array(
                "q_id" =>$result[$j],
            );
            //   dump($where);
            $resultArray = $question -> where($where)->field('answer')->find();
            $resultAnswer = $resultAnswer.$resultArray['answer'];
        }
    }
    public function toMemcache()
    {//只有管理用户有权限
        //将题目序列储存到Memcache
        echo "正在链接memcache...</br></br>";
        if( !$mem = memcache_connect('localhost',11211))
        {
            echo "链接 memcache 失败 </br></br>";
        }
        else
        {
            echo "正在链接数据库...</br></br>";
            if(!$question = M('Questions'))
            {
               echo "链接数据库失败</br></br>";
            }
            else
            {
                $array = $question->select();
                echo "正在添加题目到memcache...</br></br>";
                $success = $mem -> add("question",$array,MEMCACHE_COMPRESSED,3600);
               if(!$success)
               {    
                   echo "添加题目到memcache 失败 </br></br>";
               }
                else
                {

                   dump ($mem->get("question"));
                    echo "添加成功，正在关闭..</br>";
                    if(!$mem->close())
                    {
                        echo "关闭失败</br>";
                    }

                }
            }
        }
    }

    public function getQuestion($qQueue,&$question,&$chA,&$chB,&$chC,&$chD)
    {
     //   $qQueue = "8_11_15_19_16_5_4_14_1_9_17_7_6_18_20_2_3_10_12_13_33_27_24_31_34_28_22_21_32_39_35_37_38_25_36_29_30_23_26_40_";
        $count = 1;
        $mem = memcache_connect('localhost', 11211);
        $all = $mem->get('question');
        $countTemp = 0;
        for ($i = 1; $i <= $this->numSelect + $this->numJudge; $i++)
        {
            $numTemp = 0;
            //将字符串的数字转化成整形数字
            while ($qQueue[$countTemp] != "_" )
            {
                $numTemp = $numTemp * 10 + $qQueue[$countTemp];
                $countTemp++;
            }
            $countTemp++;
            $num = $numTemp;
            $question[$i] = $all[$num - 1]['question'];
            if($i <= $this->numSelect)
            {
                $chA[$i] = 'A、'.$all[$num - 1]['a'];
                $chB[$i] = 'B、'.$all[$num - 1]['b'];
                $chC[$i] = 'C、'. $all[$num - 1]['c'];
                $chD[$i] = 'D、'.$all[$num - 1]['d'];
            }
        //     //    echo $question[$i] . "<br/>";
        //     //    echo $chA[$i]."<br/>";
        //     //    echo $chB[$i]."<br/>";
        //      //   echo $chC[$i]."<br/>";
        //     //   echo $chD[$i]."<br/>";

        }

    }

    public function toCount()
    {
        $login = F(I("session.stuID"));
        if($login == session_id())
        {

            $resultAnswer = I("post.result");//记录用户答案序列
            $keyAnswer = I("session.aqueue");//记录正确答案序列
            $rightS = 0; //记录答对的选择题
            $rightJ = 0;//记录答对的判断题
            for ($i = 0; $i < $this->numSelect; $i++) {
                if (strcasecmp($resultAnswer[$i * 2 + 1],$keyAnswer[$i]==0)) {
                    $rightS++;
                }
            }
            for ($i = $this->numSelect; $i < $this->numSelect + $this->numJudge; $i++) {
                if (strcasecmp($resultAnswer[$i * 2 + 1],$keyAnswer[$i]==0)) {
                    $rightJ++;
                }
            }
            $mark = $rightS * 2 + $rightJ;
            $user = M('User');
            $condition['stuid'] = I('session.stuID');
            $save['mark'] = $mark;
            $user->where($condition)->field("mark")->save($save);
            F(I("session.stuID"),null);
            $this->ajaxReturn($mark);
        }
        else
        {
            $this->ajaxReturn(-1);
        }
    }

}