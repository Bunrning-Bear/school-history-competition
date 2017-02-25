<?php
namespace Home\Controller;
use Think\Controller;
class TimeController extends  Controller
    {
        protected $timeTotal = 2760;

        public function toSubmit()
        {
            $timeUsed = I('session.timeUsed');
            session_write_close();
            $timeLeft = $this->timeTotal - $timeUsed;
            //记得最后要把sleep的值改成timeleft
            if(sleep($timeLeft) == 0 )
            {

                    $this->ajaxReturn(1);
            }
            else
            {
                $this->ajaxReturn(0);
            }

        }


};