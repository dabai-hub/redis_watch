<?php
/**
 * Created by PhpStorm.
 * User: lhh
 * Date: 2018/10/10
 * Time: 10:09
 */
require_once ('vendor/autoload.php');

use Lib\RedisConnect;

$time = time();
while (floor((time()-$time)/60) < 60) {
    //写入pid
    file_put_contents(__DIR__.'/redis_pid.log',getmypid());
    for ($i=0;$i<count($redisConf);$i++) {
         $msg = '';
         $redisObj = new redisConnect($redisConf[$i]);
         $rdb = $redisObj->redisConnect($msg);
         if ($rdb === null)
         {
            sendEmail($toUser,$redisConf[$i]['port'].$msg);
            return;
         }else{
            if(!$rdb->ping())
            {
               sendEmail($toUser,$redisConf[$i]['port'].$msg);
               return;
            }
            $redisStatus = $rdb->info();
            if($redisStatus['used_memory']>209715200)
            {
                $msg = 'memory used more';
                sendEmail($toUser,$redisConf[$i]['port'].$msg);
                return;
            }
            if($redisStatus['connected_clients']>1)
            {
                $msg = 'connection num  more';
                sendEmail($toUser,$redisConf[$i]['port'].$msg);
                return;
            }
        }
        $rdb->close();
    }
    sleep(59);
}
return;
