<?php
namespace Home\Controller;
use Think\Controller;
class TimeController extends  Controller
    {
        protected $timeTotal = 20;

        public function toSubmit()
        {
            $timeUsed = I('session.timeUsed');
            session_write_close();
            $timeLeft = $this->timeTotal - $timeUsed;
            $toReturn['timeLeft'] =  $timeLeft;
            //记得最后要把sleep的值改成timeleft
            // left <=0 答题已经结束，不需要做sleep操作
            if($timeLeft<=0) $toReturn['result'] = 1;
            else
            {
                if(sleep($timeLeft) == 0)
                {
                    $toReturn['result'] = 1;
                }
                else
                {
                    $toReturn['result'] = 0;
                }
            }
            $this->ajaxReturn($toReturn);
            

        }


};